<?php

namespace Prismateq\GoogleApis;

use Google\Client;
use Google\Exception;
use Google\Model;
use Google\Service\MyBusinessAccountManagement;
use Google\Service\MyBusinessBusinessInformation;
use Google\Service\MyBusinessLodging;
use Google\Service\MyBusinessNotificationSettings;
use Google\Service\MyBusinessPlaceActions;
use Google\Service\MyBusinessVerifications;
use Google_Service_MyBusiness;
use Illuminate\Support\Facades\Route;
use RuntimeException;

class Google
{
    private const SERVICES = [
        'my_business' => Google_Service_MyBusiness::class,
        'my_business_account_management' => MyBusinessAccountManagement::class,
        'my_business_notification_settings' => MyBusinessNotificationSettings::class,
        'my_business_business_information' => MyBusinessBusinessInformation::class,
        'my_business_lodging' => MyBusinessLodging::class,
        'my_business_place_actions' => MyBusinessPlaceActions::class,
        'my_business_verifications' => MyBusinessVerifications::class,
    ];

    /**
     * @var Client
     */
    private static $clients = [];

    private static $serviceInstances = [];

    private static $currentOauth;

    private static $currentConfig = 'default';

    /**
     * @var array
     */
    private static $config = [];

    private static function newClient($configName)
    {
        $config = static::getConfig('client')[$configName] ?? [];
        $client = new Client($config['options'] ?? []);
        if (!empty($config['auth'])) $client->setAuthConfig($config['auth']);
        $guzzle = new \GuzzleHttp\Client([
            'headers' => [
                'Accept-Language' => 'en-US',
            ],
            'base_uri' => 'https://www.googleapis.com',
            'http_errors' => false,
        ]);
        $client->setHttpClient($guzzle);
        if (!empty($config['redirect_route'][0]) && Route::has($config['redirect_route'][0])) {
            $client->setRedirectUri(route($config['redirect_route'][0], $config['redirect_route'][1] ?? []));
        }
        return $client;
    }

    private static function setRedirectUri($redirectUri)
    {
        $client = static::getClient();
        $client->setRedirectUri($redirectUri);
        $client->getCache()->clear();
    }

    public static function useConfig($name)
    {
        static::$currentConfig = $name;
    }

    public static function getCurrentConfig()
    {
        return static::$currentConfig;
    }

    public static function usingConfig($name, callable $callback)
    {
        $oldConfig = static::getCurrentConfig();
        static::useConfig($name);
        $result = $callback();
        static::useConfig($oldConfig);
        return $result;
    }

    public static function getConfig($key, $default = null)
    {
        if (!static::$config) static::$config = config('google-apis');
        return static::$config[$key] ?? $default;
    }

    /**
     * @return Client
     */
    public static function getClient($configName = null)
    {
        if (!$configName) $configName = static::getCurrentConfig();
        if (empty(static::$clients[$configName])) static::$clients[$configName] = static::newClient($configName);
        return static::$clients[$configName];
    }


    private static function getService($service)
    {
        if (empty(static::$serviceInstances[$service])) {
            if (!array_key_exists($service, static::SERVICES)) throw new RuntimeException('Service "' . $service . '" is not defined.');
            $serviceClass = static::SERVICES[$service];
            static::$serviceInstances[$service] = new GoogleResourceForwarder($serviceClass, static::getClient());
        }
        return static::$serviceInstances[$service];
    }

    private static function allScopesAccepted($availableScopes)
    {
        $availableScopes = explode(' ', $availableScopes);
        $requiredScopes = array_diff(static::getClient()->getScopes() ?? [], ['openid', 'email', 'profile']);
        foreach ($requiredScopes as $requiredScope) {
            if (!in_array($requiredScope, $availableScopes)) return false;
        }
        return true;
    }

    public static function getUserInfo($idToken = null)
    {
        if (!$idToken) {
            $idToken = static::getClient()->getAccessToken()['id_token'] ?? null;
            if (!$idToken) return null;
        }
        $idExploded = explode('.', $idToken);
        if (count($idExploded) < 2) return null;
        $json = base64_decode($idExploded[1]);
        if (!$json) return null;
        return json_decode($json, true);
    }

    public static function setAccessToken($token)
    {
        $client = static::getClient();
        $client->setAccessToken($token);
        $client->getCache()->clear();
    }

    public static function createAuthUrl($redirectUri = null)
    {
        $client = static::getClient();
        if ($redirectUri) static::setRedirectUri($redirectUri);
        return $client->createAuthUrl();
    }

    public static function parseOAuthCallback($data, $redirectUri = null)
    {
        if (!empty($data['error'])) return ['error' => $data['error']];
        if (empty($data['code'])) return ['error' => 'unknown'];
        $client = static::getClient();
        if ($redirectUri) static::setRedirectUri($redirectUri);
        try {
            $tokenData = $client->fetchAccessTokenWithAuthCode($data['code']);
        } catch (Exception $exception) {
            return ['error' => 'unknown'];
        }
        if (!empty($tokenData['error'])) return ['error' => $tokenData['error']];
        if (empty($tokenData['access_token'])) return ['error' => 'unknown'];
        if (!static::allScopesAccepted($tokenData['scope'] ?? '')) return ['error' => 'scope'];
        return $tokenData;
    }

    private static function fetchOauth($refreshToken)
    {
        $client = static::getClient();
        $response = $client->fetchAccessTokenWithRefreshToken($refreshToken);
        if (isset($response['error'])) return [
            'success' => false,
            'response' => $response,
        ];
        else return [
            'success' => true,
            'new_token' => $response,
        ];
    }

    public static function configureOauth($oauth)
    {
        $client = static::getClient();
        if (empty($oauth['access_token']) && !empty($oauth['refresh_token'])) $response = static::fetchOauth($oauth['refresh_token']);
        else {
            $client->setAccessToken($oauth);
            if ($client->isAccessTokenExpired()) $response = static::fetchOauth($client->getRefreshToken());
            else $response = ['success' => true];
        }
        $client->getCache()->clear();
        if ($response['success']) static::$currentOauth = $client->getAccessToken();
        return $response;
    }

    public static function safeAction(callable $callback)
    {
        $client = static::getClient();
        $currentOauth = $client->getAccessToken();
        $result = $callback();
        if ($currentOauth) {
            $client->setAccessToken($currentOauth);
            $client->getCache()->clear();
        }
        return $result;
    }

    private static function handleException($exception, $attempt, $tryToFixException = true)
    {
        if ($tryToFixException) {
            $code = $exception->getCode();
            $attempts = static::getConfig('attempts');
            if ($code >= 500 && $attempt <= $attempts['internal']) {
                sleep($attempt * 2);
                return;
            } elseif ($code == 401 && $attempt <= $attempts['unauthorized'] && static::$currentOauth) {
                sleep(2);
                if (static::configureOauth(static::$currentOauth)['success']) return;
            } elseif ($code == 429 && $attempt <= $attempts['resource_exhausted']) {
                sleep(61);
                return;
            }
        }
        throw $exception;
    }

    private static function request($service, callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        $attempts = [];
        while (true) {
            try {
                $response = $handler($service);
                break;
            } catch (Exception $exception) {
                $code = $exception->getCode();
                if ($code == 404 && !$throwOnNotFound) return null;
                $attempts[$code] = ($attempts[$code] ?? 0) + 1;
                static::handleException($exception, $attempts[$code], $tryToFixException);
            }
        }
        if ($assoc && $response instanceof Model) {
            return json_decode(json_encode($response->toSimpleObject(), JSON_INVALID_UTF8_IGNORE), true);
        }
        return $response;
    }

    public static function myBusinessAccountManagement(callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        return static::request(static::getService('my_business_account_management'), $handler, $assoc, $tryToFixException, $throwOnNotFound);
    }

    public static function myBusinessNotifications(callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        return static::request(static::getService('my_business_notification_settings'), $handler, $assoc, $tryToFixException, $throwOnNotFound);
    }

    public static function myBusinessBusinessInformation(callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        return static::request(static::getService('my_business_business_information'), $handler, $assoc, $tryToFixException, $throwOnNotFound);
    }

    public static function myBusinessLodging(callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        return static::request(static::getService('my_business_lodging'), $handler, $assoc, $tryToFixException, $throwOnNotFound);
    }

    public static function myBusinessPlaceActions(callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        return static::request(static::getService('my_business_place_actions'), $handler, $assoc, $tryToFixException, $throwOnNotFound);
    }

    public static function myBusinessVerifications(callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        return static::request(static::getService('my_business_verifications'), $handler, $assoc, $tryToFixException, $throwOnNotFound);
    }

    public static function myBusiness(callable $handler, $assoc = true, $tryToFixException = true, $throwOnNotFound = true)
    {
        return self::request(static::getService('my_business'), $handler, $assoc, $tryToFixException, $throwOnNotFound);
    }
}
