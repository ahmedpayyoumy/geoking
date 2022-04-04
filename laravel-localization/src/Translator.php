<?php

namespace Prismateq\Localization;

use Illuminate\Support\Str;
use Illuminate\Translation\Translator as BaseTranslator;
use Prismateq\DirectoryManager\Directory;
use Prismateq\Localization\Traits\FetchesTranslations;
use Prismateq\TemporaryFile\TemporaryFile;

class Translator
{
    use FetchesTranslations;

    /**
     * Get path of language.
     *
     * @param null $language
     * @return string
     */
    private static function getPath($language = null)
    {
        $path = resource_path('lang');
        if ($language) $path .= '/' . $language;
        return $path;
    }

    /**
     * Get translations from config.
     *
     * @param false $key
     * @return mixed
     */
    private static function config($key = false)
    {
        return config('translations' . ($key ? '.' . $key : ''), $key ? null : []);
    }

    /**
     * Write translations to file.
     *
     * @param $language
     * @param $file
     * @param $data
     *
     * @return string
     */
    protected static function createTranslationsFile($language, $file, $data, $contents = null)
    {
        if (!$contents) $contents = '<?php ' . "\n\n" . 'return ' . static::serialize($data) . ';';
        if ($file !== null) {
            $path = static::getPath($language);
            if (!file_exists($path)) mkdir($path, 775, true);
            $filename = $path . '/' . $file . '.php';
        }
        else {
            $filename = TemporaryFile::create('php');
        }
        file_put_contents($filename, $contents);
        return $filename;
    }

    /**
     * Serialize a php variable to string
     *
     * @param $var
     * @param string $indent
     * @return string|null
     */
    private static function serialize($var, $indent = '')
    {
        if (is_array($var)) {
            $indexed = array_keys($var) === range(0, count($var) - 1);
            $keys = [];
            $spacing = $indent . '    ';
            foreach ($var as $key => $value) {
                $keys[] = $spacing . ($indexed ? '' : var_export($key, true) . ' => ') . static::serialize($value, $spacing);
            }
            return '[' . "\n" . implode(',' . "\n", $keys) . "\n" . $indent . ']';
        } elseif (is_null($var)) return 'null';
        else {
            return var_export($var, true);
        }
    }

    /**
     * Make replacements for translation.
     *
     * @param $line
     * @param array $replace
     * @return string
     */
    private static function makeReplacements($line, array $replace)
    {
        if (empty($replace)) return $line;
        $replace = collect($replace)->sortBy(function ($value, $key) {
            return mb_strlen($key) * -1;
        })->all();
        foreach ($replace as $key => $value) {
            $line = str_replace(
                [':' . $key, ':' . Str::upper($key), ':' . Str::ucfirst($key)],
                [$value, Str::upper($value), Str::ucfirst($value)],
                $line
            );
        }
        return $line;
    }

    /**
     * Get translations from lang path.
     *
     * @param $key
     * @param array $replace
     * @param null $language
     * @return mixed
     */
    private static function getFromLang($key, $replace = [], $language = null)
    {
        $lines = app(BaseTranslator::class)->get($key, $replace, $language, null);
        if ($lines === $key) return false;
        return $lines;
    }

    /**
     * Merge translation arrays.
     *
     * @param $primary
     * @param $secondary
     * @return array|false
     */
    private static function mergeTranslations($primary, $secondary)
    {
        if (empty($primary) || !is_array($primary)) return false;
        if (empty($secondary) || !is_array($secondary)) return $primary;
        $result = [];
        foreach ($primary as $key => $line) {
            if (is_array($line)) $result[$key] = static::mergeTranslations($line, $secondary[$key] ?? null);
            elseif (!array_key_exists($key, $secondary) || is_array($secondary[$key])) $result[$key] = $line;
            else $result[$key] = $secondary[$key];
        }
        return $result;
    }

    /**
     * Get translation
     *
     * @param $key
     * @param array $replace
     * @param null $language
     * @param bool $fallback
     * @return mixed
     */
    public static function get($key, $replace = [], $language = null, $fallback = true)
    {
        $translation = static::getFromLang($key, $replace, $language);
        if ($translation) return $translation;
        if ($fallback) {
            $defaultTranslation = static::config($key);
            if ($defaultTranslation) return static::makeReplacements($defaultTranslation, $replace);
        }
        return null;
    }

    /**
     * Get all translation files from config.
     *
     * @return array
     */
    public static function getTranslationFiles()
    {
        return array_keys(static::config());
    }

    /**
     * Get all translation lines of file from language path.
     *
     * @param $file
     * @param null $language
     * @return array|false
     */
    public static function getTranslationLines($file, $language = null)
    {
        if (!$language) $language = app()->getLocale();
        $allTranslations = static::config();
        if (!array_key_exists($file, $allTranslations)) return false;
        return static::mergeTranslations($allTranslations[$file], static::getFromLang($file, [], $language));
    }

    /**
     * Save translation lines to lang file.
     *
     * @param $language
     * @param $file
     * @param $data
     * @return bool
     */
    public static function saveTranslationLines($language, $file, $data)
    {
        $allTranslations = static::config();
        if (!array_key_exists($file, $allTranslations)) return false;
        $result = static::mergeTranslations($allTranslations[$file], $data);
        static::createTranslationsFile($language, $file, $result);
        return true;
    }

    /**
     * Audit all translation files in lang path.
     */
    public static function auditTranslations()
    {
        $path = static::getPath();
        if (!file_exists($path) || !is_dir($path)) Directory::create($path);
        $pathData = Directory::scan($path, 'separate');
        $languages = Locale::getLanguages(true);
        Directory::delete(array_merge(array_diff($pathData['dirs'], $languages), $pathData['files']), $path);
        $translationFiles = static::getTranslationFiles();
        $translationFileNames = collect($translationFiles)->map(function ($item) {
            return $item . '.php';
        })->all();
        foreach ($languages as $language) {
            $languagePath = $path . '/' . $language;
            if (file_exists($languagePath)) {
                $languagePathData = Directory::scan($languagePath, 'separate');
                Directory::delete(array_merge(array_diff($languagePathData['files'], $translationFileNames), $languagePathData['dirs']), $languagePath);
            }
            foreach ($translationFiles as $translationFile) static::createTranslationsFile($language, $translationFile, static::getTranslationLines($translationFile, $language));
        }
    }
}
