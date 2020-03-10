<?php

namespace App\Providers;

use App\Services\Weather\Weather;
use Illuminate\Support\ServiceProvider;

/**
 * Class WeatherProvider
 * @package App\Providers
 */
class WeatherProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Weather::class, function() {
            $config = config('services.weather', []);

            return new Weather($config);
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
