<?php

namespace Prismateq\Supervisor;

use Illuminate\Support\ServiceProvider;
use Prismateq\Supervisor\Commands\GenerateCommand;

class SupervisorServiceProvider extends ServiceProvider
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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->registerCommands();
    }

    /**
     * Register Config file
     *
     * @return void
     */
    private function registerConfig() {
        $this->mergeConfigFrom(__DIR__.'/../config/supervisor.php', 'supervisor');
        $this->publishes([
            __DIR__.'/../config/supervisor.php' => config_path('supervisor.php'),
        ]);
    }

    /**
     * Register Commands
     *
     * @return void
     */
    private function registerCommands() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateCommand::class
            ]);
        }
    }
}
