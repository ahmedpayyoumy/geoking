<?php

namespace Prismateq\Localization;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use RuntimeException;

class Locale
{
    /**
     * Key for session storage to save language.
     */
    private const SESSION_KEY = 'language';

    /**
     * Languages from model.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private static $languages;

    /**
     * Current language.
     *
     * @var array
     */
    private static $currentLanguage;

    /**
     * Initialize Localization service.
     */
    public static function init()
    {
        static::fetchLanguages();
        static::setCurrentLanguage();
        static::checkLocalizedRoute();
    }

    /**
     * Set current locale and timezone from user settings.
     *
     * @param $user
     */
    public static function setLocaleForUser($user)
    {
        if (!$user instanceof User) throw new RuntimeException('Please provide valid User instance.');
        static::fetchLanguages();
        static::setLanguageFromUser($user, false);
        TimeZone::setTimezoneForUser($user);
    }

    /**
     * Change the languages in session storage and authenticated user if exists.
     *
     * @param $slug
     * @return bool
     */
    public static function changeLanguage($slug)
    {
        static::fetchLanguages();
        $language = static::$languages->where(static::getLanguageSlugAttributeName(), $slug)->first();
        if (!$language) return false;
        if (auth()->check()) {
            static::saveUserLanguage(auth()->user(), $language);
        }
        static::setSession($language);
        static::setAppLocale($language);
        return true;
    }

    /**
     * Set the current language by slug.
     *
     * @param $slug
     * @return bool
     */
    public static function setLanguage($slug)
    {
        static::fetchLanguages();
        $language = static::$languages->where(static::getLanguageSlugAttributeName(), $slug)->first();
        if (!$language) return false;
        static::setAppLocale($language);
        return true;
    }

    /**
     * Get current language.
     * @return array|null
     */
    public static function getCurrentLanguage()
    {
        return static::$currentLanguage;
    }

    /**
     * Get all languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public static function getLanguages($onlySlugs = false)
    {
        static::fetchLanguages();
        if ($onlySlugs) return static::$languages->pluck(static::getLanguageSlugAttributeName())->toArray();
        return static::$languages;
    }

    /**
     * Get default language.
     *
     * @param bool $onlySlug
     * @return mixed
     */
    public static function getDefaultLanguage($onlySlug = false)
    {
        static::fetchLanguages();
        $defaultLanguage = static::$languages->where(static::getLanguageSlugAttributeName(), config('app.fallback_locale'))->first();
        if (!$defaultLanguage) throw new RuntimeException('Please set fallback locale correctly.');
        if ($onlySlug) return $defaultLanguage[static::getLanguageSlugAttributeName()];
        return $defaultLanguage;
    }

    /**
     * Get language by slug.
     *
     * @param $slug
     * @return mixed
     */
    public static function getLanguageBySlug($slug)
    {
        static::fetchLanguages();
        return static::$languages->where(static::getLanguageSlugAttributeName(), $slug)->first();
    }

    /**
     * Get language model class name.
     *
     * @return string
     */
    public static function getLanguageModel()
    {
        return config('localization.language.model');
    }

    /**
     * Fetch all languages from model.
     */
    private static function fetchLanguages()
    {
        if (!empty(static::$languages)) return;
        static::$languages = static::getLanguageModel()::{config('localization.language.fetch_method')}();
        if (!static::$languages) throw new RuntimeException('Please run LanguageSeeder.');
    }

    /**
     * Set current application language.
     */
    private static function setCurrentLanguage()
    {
        if ($user = auth()->user()) {
            if (!static::setLanguageFromUser($user)) static::setLanguageFromSession($user);
            TimeZone::setTimezoneForUser($user);
        } else static::setLanguageFromSession();
    }

    /**
     * Check for localized route
     */
    private static function checkLocalizedRoute()
    {
        $currentRoute = Route::getCurrentRoute();
        if ($currentRoute->isLocalized()) {
            $locale = $currentRoute->originalParameter('locale');
            if ($locale != static::$currentLanguage[static::getLanguageSlugAttributeName()]) static::changeLanguage($locale);
        } elseif ($currentRoute->isLocalizable() && Request::getMethod() == 'GET') {
            Session::reflash();
            Redirect::toLocale()->throwResponse();
        }
    }

    /**
     * @param $user
     * @param bool $updateSession
     * @return bool
     */
    private static function setLanguageFromUser($user, $updateSession = true)
    {
        $userLanguage = static::getLanguageById($user[static::getUserLanguageAttributeName()]);
        if ($userLanguage) {
            if ($updateSession) static::setSession($userLanguage);
            static::setAppLocale($userLanguage);
            return true;
        }
        return false;
    }

    /**
     * Set current language from session storage.
     *
     * @param null $user
     */
    private static function setLanguageFromSession($user = null)
    {
        $sessionLanguageId = Session::get(static::SESSION_KEY);
        if ($sessionLanguageId && $sessionLanguage = static::getLanguageById($sessionLanguageId)) {
            if ($user) static::saveUserLanguage($user, $sessionLanguage);
            static::setAppLocale($sessionLanguage);
        } else {
            $defaultLanguage = static::getDefaultLanguage(false);
            if ($user) static::saveUserLanguage($user, $defaultLanguage);
            static::setSession($defaultLanguage);
            static::setAppLocale($defaultLanguage);
        }
    }

    /**
     * Get language by id.
     *
     * @param $id
     * @return mixed
     */
    private static function getLanguageById($id)
    {
        return static::$languages->where('id', $id)->first();
    }

    /**
     * Put language to session storage.
     *
     * @param $language
     */
    private static function setSession($language)
    {
        if (Session::get(static::SESSION_KEY) != $language['id']) {
            Session::put(static::SESSION_KEY, $language['id']);
            Session::save();
        }
    }

    /**
     * Share data for all views.
     */
    private static function shareDataForView()
    {
        View::share('lang', [
            'current' => static::$currentLanguage,
            'other' => static::$languages->filter(function ($value, $key) {
                return $value['id'] != static::$currentLanguage['id'];
            })->values()->toArray()
        ]);
    }

    /**
     * Set app locale.
     *
     * @param $language
     */
    private static function setAppLocale($language)
    {
        if ((static::$currentLanguage['id'] ?? null) != $language['id']) {
            static::$currentLanguage = $language->toArray();
            static::shareDataForView();
        }
        $languageSlug = $language[static::getLanguageSlugAttributeName()];
        App::setLocale($languageSlug);
        if (config('localization.localize_carbon')) Carbon::setLocale($languageSlug);
    }

    /**
     * Get language attribute name of the User model.
     *
     * @return string
     */
    private static function getUserLanguageAttributeName()
    {
        return config('localization.attributes.user_language');
    }

    /**
     * Get slug attribute name of language model
     *
     * @return string
     */
    private static function getLanguageSlugAttributeName()
    {
        return config('localization.attributes.language_slug');
    }

    /**
     * Save the language for the user to the database.
     *
     * @param $user
     * @param $language
     * @return true
     */
    public static function saveUserLanguage($user, $language)
    {
        $languageModel = static::getLanguageModel();
        if (get_class($language) != $languageModel) throw new RuntimeException('$language must be instance of "' . $languageModel . '".');
        $user[static::getUserLanguageAttributeName()] = $language['id'];
        $user->save();
        return true;
    }
}
