<?php

namespace Anwar\Soshare;

use Illuminate\Support\ServiceProvider;

class SoshareProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/soshare.php' => config_path('soshare.php'),
        ], 'setting');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       include __DIR__.'/Routes.php';
       $this->app->make('Anwar\Soshare\SoshareController');
       $this->app->bind('Soshare', function() {
            return new SoshareController;
        });
    }
}
