<?php

namespace Prismateq\Localization\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

trait FetchesTranslations
{
    /**
     * Create Route for getting translations.
     *
     * @return string
     */
    protected static function getRouteName()
    {
        return '/localization/translations/get';
    }

    /**
     * Translations hash to prevent outside requests.
     *
     * @return string
     */
    protected static function getTranslationsHash()
    {
        return '$2y$10$FrWZZMR4MXRgVdUUHQZKie30kihJXDHe7ihxkEciLOzD5UsB/uwQm';
    }

    /**
     * Validate creation for new files
     */
    protected static function validateHash($hash)
    {
        return Hash::check($hash, self::getTranslationsHash());
    }

    /**
     * Creating temporary translations file for requested file
     *
     * @param $filename
     * @param $except
     * @return string|null
     */
    protected static function resolveTranslations($translations, $except, $create)
    {
        if (!$translations) return null;
        $create = $create && self::validateHash($create)?$translations:null;
        if (!$create) {
            $translations = t($translations);
            if (!$translations) return null;
            if ($except) $translations = Arr::except($translations, $except);
        }
        return self::createTranslationsFile(app()->getLocale(), null, $translations, $create);
    }


    /**
     * Convert translations file into JSON Response.
     *
     * @param $file
     * @return \Illuminate\Http\JsonResponse
     */
    protected static function createTranslationsJsonResponse($file)
    {
        if (!$file) return Response::json(['status' => '404'])->setStatusCode(404);
        return Response::json(include $file);
    }

    /**
     * Register route for getting translations.
     */
    public static function register()
    {
        Route::post(self::getRouteName(), function (Request $request) {
            $file = self::resolveTranslations($request->input('file'), $request->input('except'), $request->input('create'));
            return self::createTranslationsJsonResponse($file);
        });
    }
}
