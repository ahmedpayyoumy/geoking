<?php

namespace Prismateq\Localization\Routing;

use Illuminate\Routing\UrlGenerator as BaseUrlGenerator;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class UrlGenerator extends BaseUrlGenerator
{
    /**
     * Get the URL to a named route.
     *
     * @param string $name
     * @param mixed $parameters
     * @param bool $absolute
     * @return string
     *
     * @throws RouteNotFoundException
     */
    public function route($name, $parameters = [], $absolute = true)
    {
        if (!is_null($route = $this->routes->getByName($name))) {
            if ($route->getAction('localized') && !isset($parameters['locale'])) $parameters['locale'] = app()->getLocale();
            return $this->toRoute($route, $parameters, $absolute);
        }

        throw new RouteNotFoundException("Route [{$name}] not defined.");
    }
}
