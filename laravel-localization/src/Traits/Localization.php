<?php

namespace Prismateq\Localization\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Prismateq\EloquentAddons\DynamicMutators\HasDynamicMutators;
use Prismateq\Localization\TimeZone;
use RuntimeException;

trait Localization
{
    use HasDynamicMutators;

    /**
     * Check if an attribute is a date attribute.
     *
     * @param $key
     * @return bool
     */
    public function isDateAttribute($key)
    {
        return in_array($key, $this->getDates());
    }

    /**
     * Override Laravel Model's fromDateTime method to add Timezone logic.
     *
     * @param mixed $value
     * @return string|null
     */
    public function fromDateTime($value)
    {
        return empty($value) ? $value : TimeZone::convertToServer(parent::asDateTime($value))->format(
            $this->getDateFormat()
        );
    }

    /**
     * Override Laravel Model's asDateTime method to add Timezone logic.
     *
     * @param $value
     * @return \Carbon\Carbon
     */
    protected function asDateTime($value)
    {
        return TimeZone::convertToLocal(parent::asDateTime($value));
    }

    /**
     * Get translatable attributes for a model.
     *
     * @return array
     */
    public function getTranslatableAttributes()
    {
        return isset($this->translatable) && is_array($this->translatable)
            ? $this->translatable
            : [];
    }

    protected function dynamicGetterLocalization($key, &$result)
    {
        if (!$this->isTranslatableAttribute($key)) return false;
        $result = $this->translate($key);
        return true;
    }

    protected function dynamicSetterLocalization($key, $value)
    {
        if (!$this->isTranslatableAttribute($key)) return false;
        if (is_array($value)) $this->setTranslations($key, $value);
        else $this->setTranslation($key, App::getLocale(), $value);
        return true;
    }

    protected function dynamicCastsLocalization()
    {
        return array_fill_keys($this->getTranslatableAttributes(), 'array');
    }

    /**
     * Translate attribute.
     *
     * @param string $key
     * @param ?string $language
     * @param bool $useFallbackLocale
     * @return string
     */
    public function translate(string $key, ?string $language = null, bool $useFallbackLocale = true)
    {
        if (!$language) $language = App::getLocale();
        $translations = $this->getTranslations($key);
        if (!array_key_exists($language, $translations) && $useFallbackLocale && ($fallbackLocale = config('app.fallback_locale'))) {
            $language = $fallbackLocale;
        }
        return $translations[$language] ?? '';
    }

    /**
     * Get all translations of attribute.
     *
     * @param string $key
     * @return array
     */
    public function getTranslations(string $key)
    {
        $this->mustBeTranslatableAttribute($key);
        $translations = json_decode($this->attributes[$key] ?? '', true);
        if (!is_array($translations)) return [];
        return Arr::where($translations, function ($value, $key) {
            return $value !== null && $value !== '';
        });
    }

    /**
     * Check if attribute has translation of language.
     *
     * @param string $key
     * @param string|null $language
     * @return bool
     */
    public function hasTranslation(string $key, string $language = null)
    {
        return isset($this->getTranslations($key)[$language ?: App::getLocale()]);
    }

    /**
     * Set translation of attribute.
     *
     * @param string $key
     * @param string $language
     * @param $value
     * @return $this
     */
    public function setTranslation(string $key, string $language, $value)
    {
        $translations = $this->getTranslations($key);
        $translations[$language] = $value;
        $this->attributes[$key] = $this->asJson($translations);
        return $this;
    }

    /**
     * Set multiple translations of attribute
     *
     * @param string $key
     * @param array $values
     * @return $this
     */
    public function setTranslations(string $key, array $values)
    {
        $translations = $this->getTranslations($key);
        foreach ($values as $language => $value) {
            $translations[$language] = $value;
        }
        $this->attributes[$key] = $this->asJson($translations);
        return $this;
    }

    /**
     * Remove translation of attribute.
     *
     * @param string $key
     * @param string $language
     * @return $this
     */
    public function removeTranslation(string $key, string $language)
    {
        $translations = $this->getTranslations($key);
        unset($translations[$language]);
        $this->attributes[$key] = $this->asJson($translations);
        return $this;
    }

    /**
     * Remove all translations of attribute.
     *
     * @param string $key
     * @return $this
     */
    public function clearTranslations(string $key)
    {
        $this->mustBeTranslatableAttribute($key);
        $this->attributes[$key] = '{}';
        return $this;
    }

    /**
     * Check if attribute is translatable.
     *
     * @param string $key
     * @return bool
     */
    public function isTranslatableAttribute(string $key)
    {
        return in_array($key, $this->getTranslatableAttributes());
    }

    /**
     * Throw an exception if attribute is not translatable.
     *
     * @param string $key
     */
    protected function mustBeTranslatableAttribute(string $key)
    {
        if (!$this->isTranslatableAttribute($key)) throw new RuntimeException('Attribute "' . $key . '" is not translatable.');
    }
}
