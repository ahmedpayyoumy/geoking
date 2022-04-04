<?php

namespace Prismateq\Localization;

use Prismateq\Localization\Routing\LocalizedRouter;
use Prismateq\Localization\Routing\UrlGenerator;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Prismateq\Localization\Commands\AuditTranslationsCommand;
use Prismateq\Localization\Commands\OverrideModelLocalizationCommand;
use Prismateq\Localization\Middleware\InitLocalization;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerUrlGenerator();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->registerMiddleware();
        $this->registerCommands();
        Translator::register();
        LocalizedRouter::register();
    }

    /**
     * Register InitLocalization Middleware
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function registerMiddleware()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('localization.init', InitLocalization::class);
    }

    /**
     * Register Config file
     *
     * @return void
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/localization.php', 'localization');
        $this->publishes([
            __DIR__ . '/../config/localization.php' => config_path('localization.php'),
        ]);
    }

    /**
     * Register Commands
     *
     * @return void
     */
    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                OverrideModelLocalizationCommand::class,
                AuditTranslationsCommand::class,
            ]);
        }
    }

    /**
     * Register the URL generator service.
     *
     * @return void
     */
    protected function registerUrlGenerator()
    {
        $this->app->singleton('url', function ($app) {
            $routes = $app['router']->getRoutes();
            $app->instance('routes', $routes);

            return new UrlGenerator(
                $routes, $app->rebinding(
                'request', $this->requestRebinder()
            ), $app['config']['app.asset_url']
            );
        });
    }

    /**
     * Get the URL generator request rebinder.
     *
     * @return \Closure
     */
    protected function requestRebinder()
    {
        return function ($app, $request) {
            $app['url']->setRequest($request);
        };
    }
}
