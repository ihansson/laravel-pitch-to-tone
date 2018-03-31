<?php

namespace Ihansson\PitchToTone;

use Illuminate\Support\ServiceProvider;

class PitchToToneServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ihansson\PitchToTone\PitchToToneController');
    }
}
