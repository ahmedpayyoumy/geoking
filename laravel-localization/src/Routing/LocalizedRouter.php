<?php

namespace Prismateq\Localization\Routing;


use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Prismateq\Localization\Locale;
use Illuminate\Routing\Route as RouteElement;

class LocalizedRouter
{
    /**
     * Register localized router.
     *
     * @return void
     */
    public static function register()
    {
        Route::pattern('locale', self::getRoutePattern());
        Route::macro('localized', [self::class, 'localizedRouteGroup']);
        URL::macro('translate', [self::class, 'translateUrl']);
        URL::macro('translateCurrent', [self::class, 'translateCurrentUrl']);
        URL::macro('translatePrevious', [self::class, 'translatePreviousUrl']);
        URL::macro('isLocalized', [self::class, 'isCurrentRouteLocalized']);
        Redirect::macro('toLocale', [self::class, 'redirectToLocale']);
        Redirect::macro('withLocale', [self::class, 'redirectWithLocale']);
        Redirect::macro('backWithLocale', [self::class, 'redirectBackWithLocale']);
        self::registerRouteElementMacros();
        self::registerListeners();
    }

    /**
     * Register route element macros.
     *
     * @return void
     */
    private static function registerRouteElementMacros()
    {
        RouteElement::macro('isLocalized', function () {
            return $this->getAction('localized');
        });
        RouteElement::macro('isLocalizable', function () {
            return $this->getAction('localizable');
        });
        RouteElement::macro('getLocalePosition', function () {
            return $this->getAction('locale_position');
        });
    }

    /**
     * Register event listeners.
     *
     * @return void
     */
    private static function registerListeners()
    {
        Event::listen(function (RouteMatched $event) {
            $event->route->setParameter('locale', null);
        });
    }

    /**
     * Get route pattern with all languages.
     *
     * @return string
     */
    private static function getRoutePattern()
    {
        return Collection::make(Locale::getLanguages(true))->map('preg_quote')->implode('|');
    }

    /**
     * Create a localized route group.
     *
     * @return void
     */
    public static function localizedRouteGroup(callable $callback)
    {
        $localePosition = 1;
        $groupStack = Arr::last(Route::getGroupStack());
        if ($groupStack) {
            $prefix = trim((string)$groupStack['prefix'], '/');
            if ($prefix) {
                $localePosition += count(explode($prefix, '/'));
            }
        }
        Route::group([
            'prefix' => '{locale}',
            'localized' => true,
            'locale_position' => $localePosition,
        ], $callback);
        Route::group([
            'as' => 'localizable.',
            'localizable' => true,
            'locale_position' => $localePosition,
        ], $callback);
    }

    /**
     * Safely find route from url.
     *
     * @param string $url
     * @param string $method
     *
     * @return RouteElement|null
     */
    public static function findRoute($url, $method = 'GET')
    {
        try {
            return Route::getRoutes()->match(Request::create($url, $method));
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Add locale to url
     *
     * @param string $url
     * @param string $locale
     * @param string|int $position
     * @param bool $replace
     *
     * @return string
     */
    private static function addLocale($url, $locale, $position, $replace = false)
    {
        $parsed = parse_url((string)$url);
        $parsed['path'] = trim($parsed['path'] ?? '', '/');
        $explodedPath = explode('/', '/' . $parsed['path']);
        if ($replace) {
            if (isset($explodedPath[$position]) && $explodedPath[$position] !== $locale) {
                $explodedPath[$position] = $locale;
            }
        } else array_splice($explodedPath, $position, 0, [$locale]);
        $parsed['path'] = implode('/', $explodedPath);
        $result = '';
        if (!empty($parsed['host'])) {
            if (!empty($parsed['scheme'])) $result .= $parsed['scheme'] . ':';
            $result .= '//' . $parsed['host'];
        }
        $result .= $parsed['path'];
        if ($result != '/') $result = rtrim($result, '/');
        if (!empty($parsed['query'])) $result .= '?' . $parsed['query'];
        return $result;
    }

    /**
     * Check if current route is localized.
     *
     * @return boolean
     */
    public static function isCurrentRouteLocalized()
    {
        return Route::getCurrentRoute()->isLocalized();
    }

    /**
     * Get URL with locale.
     *
     * @param string $url
     * @param string|null $locale
     *
     * @return string
     */
    public static function translateUrl($url, $locale = null)
    {
        if (!$locale) $locale = App::getLocale();
        $route = self::findRoute($url);
        if ($route) {
            if ($route->isLocalizable()) return self::addLocale($url, $locale, $route->getLocalePosition());
            if ($route->isLocalized()) return self::addLocale($url, $locale, $route->getLocalePosition(), true);
        }
        return $url;
    }

    /**
     * Get current URL with locale.
     *
     * @param string|null $locale
     *
     * @return string
     */
    public static function translateCurrentUrl($locale = null)
    {
        return self::translateUrl(URL::full(), $locale);
    }

    /**
     * Get previous URL with locale.
     *
     * @param string|null $locale
     *
     * @return string
     */
    public static function translatePreviousUrl($locale = null)
    {
        return self::translateUrl(URL::previous(), $locale);
    }

    /**
     * Redirect to URL with locale.
     *
     * @param $url
     * @param null $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function redirectWithLocale($url, $locale = null)
    {
        return Redirect::to(self::translateUrl($url, $locale));
    }

    /**
     * Redirect to same URL with locale.
     *
     * @param $url
     * @param null $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function redirectToLocale($locale = null)
    {
        return self::redirectWithLocale(URL::full(), $locale);
    }

    /**
     * Redirect to previous URL with locale.
     *
     * @param $url
     * @param null $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function redirectBackWithLocale($locale = null)
    {
        return self::redirectWithLocale(URL::previous(), $locale);
    }
}
