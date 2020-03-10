<?php

namespace App\Services\Weather\City;

use App\Services\Weather\City\Contracts\CityInterface;
use App\Services\Weather\Latitude\Latitude;
use App\Services\Weather\Longitude\Longitude;

/**
 * Class CityWeather
 * @package App\Services\Weather
 */
class City implements CityInterface
{
    /**
     * Name of city
     * @var string
     */
    public $name;

    /**
     * Latitude
     * @var Coordinate
     */
    public $lat = null;

    /**
     * Longitude
     * @var Coordinate
     */
    public $lon = null;

    public function __construct(string $name, Coordinate $lat = null, Coordinate $lon = null)
    {
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Setter lat
     * @param Coordinate $lat
     * @return void
     */
    public function setLat(Coordinate $lat) : void
    {
        $this->lat = $lat;
    }

    /**
     * Getter lat
     * @return float
     */
    public function getLat() : float
    {
        return $this->lat->getValue() ?? 0;
    }

    /**
     * Setter lon
     * @param Coordinate $lon
     * @return void
     */
    public function setLon(Coordinate $lon) : void
    {
      $this->lon = $lon;
    }

    /**
     * Getter lon
     * @return float
     */
    public function getLon() : float
    {
        return $this->lon->getValue() ?? 0;
    }
}