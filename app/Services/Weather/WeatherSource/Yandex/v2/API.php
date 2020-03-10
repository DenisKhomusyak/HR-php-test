<?php

namespace App\Services\Weather\Yandex\v2;

use App\Services\Weather\City;
use App\Services\Weather\WeatherSourceAdapter;

class API implements WeatherSourceAdapter
{
    public function getCurrentTemp(City $city)
    {
        // parsing page https://yandex.ru/pogoda/krasnoyarsk?lat=56.013711&lon=92.877397
    }
}