<?php

namespace App\Services\Weather;

use App\Services\Weather\Yandex\v1\API;

/**
 * Class Weather
 * @package App\Services\Weather
 */
class Weather
{
    /**
     * @var array
     */
    public $config;

    /**
     * @var WeatherInterfaceAdapter|null
     */
    public $weatherApi = null;

    /**
     * @var City|null
     */
    public $city = null;

    /**
     * Weather constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->weatherApi = new API($config['default']['base_url'], $config['default']['api_key']);
    }

    /**
     * @param City $city
     */
    public function setCity(City $city) : void
    {
        $this->city = $city;
    }

    /**
     * @return City|null
     */
    public function getCity() : ?string
    {
        return $this->city;
    }

    /**
     * Change weatherApi
     * @param WeatherInterfaceAdapter $weatherInterfaceAdapter
     */
    public function setWeatherSource(WeatherInterfaceAdapter $weatherInterfaceAdapter) : void
    {
        $this->weatherApi = $weatherInterfaceAdapter;
    }

    /**
     * Get temperature in city
     * @return string|null
     */
    public function getTemp()
    {
        return $this->weatherApi->getCurrentTemp($this->city);
    }
}