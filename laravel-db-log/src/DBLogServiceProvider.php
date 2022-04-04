<?php

namespace Prismateq\DBLog;

use Illuminate\Support\ServiceProvider;
use Prismateq\DBLog\Commands\RemoveExpired;

class DBLogServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSingleton();
        $this->registerConfig();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->registerMigrations();
        $this->registerCommands();
    }

    /**
     * Register Logger Singleton
     */
    private function registerSingleton()
    {
        $this->app->singleton('db-log', function ($app) {
            return new Logger();
        });
    }

    /**
     * Register Config file
     *
     * @return void
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/db-log.php', 'db-log');
        $this->publishes([
            __DIR__ . '/../config/db-log.php' => config_path('db-log.php'),
        ]);
    }

    /**
     * Register Migrations
     */
    private function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    /**
     * Register Commands
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->commands([
            RemoveExpired::class,
        ]);
    }
}
