<?php

namespace Prismateq\EloquentAddons\DynamicMutators;

use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;

trait HasDynamicMutators
{

    private static $dynamicMutators;

    private static function registerDynamicMutators()
    {
        $dynamicMutators = [];
        $reflectionClass = new ReflectionClass(static::class);
        $reflectionMethods = $reflectionClass->getMethods(~ReflectionMethod::IS_STATIC);
        foreach ($reflectionMethods as $reflectionMethod) {
            $methodName = $reflectionMethod->getName();
            if (Str::startsWith($methodName, 'dynamicGetter')) $dynamicMutators['getters'][] = $methodName;
            if (Str::startsWith($methodName, 'dynamicSetter')) $dynamicMutators['setters'][] = $methodName;
            if (Str::startsWith($methodName, 'dynamicCasts')) $dynamicMutators['casts'][] = $methodName;
        }
        static::$dynamicMutators = $dynamicMutators;
    }

    private static function getDynamicMutators(string $type)
    {
        if (static::$dynamicMutators === null) static::registerDynamicMutators();
        return static::$dynamicMutators[$type] ?? [];
    }

    private function getDynamicAttribute($key, callable $onFailure){
        if ($mutators = static::getDynamicMutators('getters')) foreach ($mutators as $mutator) {
            $result = null;
            if ($this->{$mutator}($key, $result)) return $result;
        }
        return $onFailure($key);
    }

    /**
     * @param $key
     * @return void|mixed
     */
    public function getAttribute($key)
    {
        if (!$key) return;
        return $this->getDynamicAttribute($key, function($key) {
            return parent::getAttribute($key);
        });
    }

    public function setAttribute($key, $value)
    {
        if ($mutators = static::getDynamicMutators('setters')) foreach ($mutators as $mutator) {
            if ($this->{$mutator}($key, $value)) return $this;
        }
        return parent::setAttribute($key, $value);
    }

    public function getCasts()
    {
        $casts = parent::getCasts();
        if ($mutators = static::getDynamicMutators('casts')) foreach ($mutators as $mutator) {
            $dynamicCasts = $this->{$mutator}();
            if (!empty($dynamicCasts) && is_array($dynamicCasts)) $casts = array_merge($dynamicCasts);
        }
        return $casts;
    }

    protected function mutateAttribute($key, $value) {
        return $this->getDynamicAttribute($key, function($key) use ($value) {
            return parent::mutateAttribute($key, $value);
        });
    }
}
