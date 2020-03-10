<?php

namespace App\Services\Weather\WeatherSource;

use App\Services\Weather\City\Contracts\CityInterface;

/**
 * Interface WeatherSource
 * @package App\Services\Weather
 */
interface WeatherSourceAdapter
{
    /**
     * @param CityInterface $city
     * @return mixed
     */
    public function getCurrentTempCity(CityInterface $city);
}