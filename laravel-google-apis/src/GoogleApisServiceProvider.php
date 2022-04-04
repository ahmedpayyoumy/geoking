<?php

namespace Prismateq\GoogleApis;

use Illuminate\Support\ServiceProvider;

class GoogleApisServiceProvider extends ServiceProvider
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
    private function registerConfig() {
        $this->mergeConfigFrom(__DIR__.'/../config/google-apis.php', 'google-apis');
        $this->publishes([
            __DIR__.'/../config/google-apis.php' => config_path('google-apis.php'),
        ]);
    }
}
