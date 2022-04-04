<?php

namespace Prismateq\PDF;

use Illuminate\Support\ServiceProvider;

class PDFServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register Config file
     *
     * @return void
     */
    private function registerConfig() {
        $this->mergeConfigFrom(__DIR__.'/../config/pdf.php', 'pdf');
        $this->publishes([
            __DIR__.'/../config/pdf.php' => config_path('pdf.php'),
        ]);
    }
}
