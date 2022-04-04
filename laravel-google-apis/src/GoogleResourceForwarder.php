<?php

namespace Prismateq\GoogleApis;

use Google\Model;

class GoogleResourceForwarder
{
    private $service;
    private $resource;

    public function __construct($service, ...$arguments)
    {
        $this->service = new $service(...$arguments);
    }

    private function __clone()
    {
    }

    public function __get($property)
    {
        $this->resource = $property;
        return $this;
    }

    public function __call($method, $arguments)
    {
        if (!$this->resource) return $this->service->$method(...$arguments);
        $resource = $this->service->{$this->resource};
        unset($this->resource);
        $reflectionParameters = (new \ReflectionMethod($resource, $method))->getParameters();
        foreach ($reflectionParameters as $key => $reflectionParameter) {
            $type = $reflectionParameter->getType();
            if ($type) {
                $class = $type->getName();
                if (class_exists($class) && isset($arguments[$key]) && is_subclass_of($class, Model::class)) {
                    $arguments[$key] = new $class($arguments[$key]);
                }
            }
        }
        return $resource->$method(...$arguments);
    }
}
