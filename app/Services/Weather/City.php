<?php
namespace App\Services\Weather;

/**
 * Class CityWeather
 * @package App\Services\Weather
 */
class City
{
    /**
     * Name of city
     * @var string
     */
    public $name;

    /**
     * Latitude
     * @var float
     */
    public $lat = null;

    /**
     * Longitude
     * @var float
     */
    public $lon = null;

    /**
     * CityWeather constructor.
     * @param string $name
     * @param float|null $lat
     * @param float|null $lon
     */
    public function __construct(string $name, float $lat = null, float $lon = null)
    {
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
    }

    /**
     * Setter lat
     * @param float $lat
     * @return void
     */
    public function setLat(float $lat) : void
    {
        $this->lat = $lat;
    }

    /**
     * Getter lat
     * @return float
     */
    public function getLat() : float
    {
        return $this->lat;
    }

    /**
     * Setter lon
     * @param float $lon
     * @return void
     */
    public function setLon(float $lon) : void
    {
      $this->lon = $lon;
    }

    /**
     * Getter lon
     * @return float
     */
    public function getLon() : float
    {
        return $this->lon;
    }
}