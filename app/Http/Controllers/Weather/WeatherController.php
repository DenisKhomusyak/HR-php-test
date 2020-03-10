<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Services\Weather\City;
use App\Services\Weather\Weather;

/**
 * Class WeatherController
 * @package App\Http\Controllers\Weather
 */
class WeatherController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $weather = app(Weather::class);
        $weather->setCity(new City('Красноярск', 56.013711, 92.877397));
        $temp = $weather->getTemp();

        return view('weather', compact('temp'));
    }
}
