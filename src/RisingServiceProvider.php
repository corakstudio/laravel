<?php

namespace CorakStudio\Rising;

use Illuminate\Support\ServiceProvider;

class RisingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/databases/migrations');
        $this->loadTranslationsFrom(__DIR__.'/lang', 'Rising');
        $this->loadViewsFrom(__DIR__.'/app/views', 'Rising');
        $this->publishes([
        __DIR__.'/config/config.php' => config_path('rising.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('CorakStudio\Rising\Controllers\DashboardController');
    }
}
