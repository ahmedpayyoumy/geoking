<?php

use App\Services\Toast\Toast;
use Prismateq\Localization\Translator;

if (!function_exists('t')) {
    /**
     * Get translation from the Localization service.
     *
     * @param $key
     * @param array $replace
     * @param null $locale
     * @param bool $fallback
     * @return mixed
     */
    function t($key, $replace = [], $locale = null, $fallback = true)
    {
        return Translator::get($key, $replace, $locale, $fallback);
    }
}

if (!function_exists('translate_array')) {
    function translate_array($translation, $locale = null, $fallback = true) {
        if (!$translation) return null;
        if (is_array($translation)) {
            $key = $translation[0];
            $replacements = $translation[1] ?? [];
        } else {
            $key = $translation;
            $replacements = [];
        }
        $result = Translator::get($key, $replacements, $locale, $fallback);
        if (!is_string($result)) return null;
        return $result;
    }
}
if (!function_exists('column_letter')) {
    function column_letter($c){
        $c = intval($c);
        if ($c <= 0) return '';
        $letter = '';
        while($c != 0){
            $p = ($c - 1) % 26;
            $c = intval(($c - $p) / 26);
            $letter = chr(65 + $p) . $letter;
        }
        return $letter;
    }
}
