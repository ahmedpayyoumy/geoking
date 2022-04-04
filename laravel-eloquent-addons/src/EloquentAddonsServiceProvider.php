<?php

namespace Prismateq\EloquentAddons;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Prismateq\Localization\Commands\AuditTranslationsCommand;
use Prismateq\Localization\Commands\OverrideModelLocalizationCommand;
use Prismateq\Localization\Middleware\InitLocalization;

class EloquentAddonsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register Config file
     *
     * @return void
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/eloquent-addons.php', 'eloquent-addons');
        $this->publishes([
            __DIR__ . '/../config/eloquent-addons.php' => config_path('eloquent-addons.php'),
        ]);
    }
}
