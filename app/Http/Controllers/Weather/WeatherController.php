<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Services\Weather\City\City;
use App\Services\Weather\City\Latitude\Latitude;
use App\Services\Weather\City\Longitude\Longitude;
use App\Services\Weather\Weather;
use App\Services\Weather\WeatherSource\OpenWeatherMap\v1\API as owmAPI;
use Illuminate\Http\JsonResponse;

/**
 * Class WeatherController
 * @package App\Http\Controllers\Weather
 */
class WeatherController extends Controller
{
    /**
     * @param Weather $weather
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Weather $weather) : JsonResponse
    {
        $servicesTemp = [];
        $weather->setCity(new City('Красноярск', new Latitude(56.013711), new Longitude(92.877397)));

        $servicesTemp[$weather->getCity()->getName()]['default'] = $weather->getTemp();

        $weather->setWeatherSource(new owmAPI(config('weather.weather_sources.owm')));
        $servicesTemp[$weather->getCity()->getName()]['owm'] = $weather->getTemp();

        return response()->json($servicesTemp);
    }
}
