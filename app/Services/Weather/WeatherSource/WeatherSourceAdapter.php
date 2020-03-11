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
     * Get temperature by city
     * @param CityInterface $city
     * @return mixed
     */
    public function getCurrentTempCity(CityInterface $city) : ?string ;

    /**
     * Name of service
     * @return string
     */
    public function getName() : string ;

    /**
     * Time of expire cache data
     * @return int
     */
    public function getCacheTime() : int ;
}