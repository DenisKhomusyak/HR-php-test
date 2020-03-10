<?php

namespace App\Services\Weather;

/**
 * Interface WeatherAdapter
 * @package App\Services\Weather
 */
interface WeatherInterfaceAdapter
{
    /**
     * @return string
     */
    public function getCurrentTemp(City $city);
}