<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Services\Weather\City;
use App\Services\Weather\Weather;
use App\Services\Weather\Yandex\v2\API;

/**
 * Class WeatherController
 * @package App\Http\Controllers\Weather
 */
class WeatherController extends Controller
{
    /**
     * @param Weather $weather
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Weather $weather)
    {
        $servicesTemp = [];
        $weather->setCity(new City('Красноярск', 56.013711, 92.877397));

        $servicesTemp['default'] = $weather->getTemp();

        $weather->setWeatherSource(new API());
        $servicesTemp['openweathermap'] = $weather->getTemp();

        dd($servicesTemp);
        return view('weather', compact('temp'));
    }
}
