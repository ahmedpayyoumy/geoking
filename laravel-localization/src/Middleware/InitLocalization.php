<?php

namespace Prismateq\Localization\Middleware;

use Prismateq\Localization\Locale;
use Closure;
use Illuminate\Http\Request;

class InitLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Locale::init();
        return $next($request);
    }
}
