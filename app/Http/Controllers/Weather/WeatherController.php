<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Services\Weather\City\City;
use App\Services\Weather\City\Latitude\Latitude;
use App\Services\Weather\City\Longitude\Longitude;
use App\Services\Weather\Weather;
use App\Services\Weather\WeatherSource\OpenWeatherMap\v1\API as owmAPI;
use App\Services\Weather\WeatherSource\Yandex\v1\API as yandexAPI;
use Illuminate\View\View;

/**
 * Class WeatherController
 * @package App\Http\Controllers\Weather
 */
class WeatherController extends Controller
{
    /**
     * @param Weather $weather
     * @return View
     */
    public function get(Weather $weather) : View
    {
        $servicesTemp = [];

        $weather->setCity(new City('Брянск', new Latitude(53.2423778), new Longitude(34.3668288)));

        $servicesTemp[$weather->getCity()->getName()][$weather->getNameService()] = $weather->getTemp();

        $weather->setWeatherSource(new owmAPI(config('weather.weather_sources.owm')));
        $servicesTemp[$weather->getCity()->getName()][$weather->getNameService()] = $weather->getTemp();

        $weather->setCity(new City('Красноярск', new Latitude(56.013711), new Longitude(92.877397)));

        $weather->setWeatherSource(new yandexAPI(config('weather.weather_sources.yandex')));
        $servicesTemp[$weather->getCity()->getName()][$weather->getNameService()] = $weather->getTemp();

        $weather->setWeatherSource(new owmAPI(config('weather.weather_sources.owm')));
        $servicesTemp[$weather->getCity()->getName()][$weather->getNameService()] = $weather->getTemp();

        return view('frontend.weather', compact('servicesTemp'));
    }
}
