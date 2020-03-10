<?php

namespace App\Providers;

use App\Services\Weather\Weather;
use Illuminate\Support\ServiceProvider;

/**
 * Class WeatherServiceProvider
 * @package App\Providers
 */
class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Weather::class, function($app) {
            return new Weather($app->make('config')->get('weather'));
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [Weather::class];
    }
}
