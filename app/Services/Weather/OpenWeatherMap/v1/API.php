<?php

namespace App\Services\OpenWeatherMap\v1;

use App\Services\Weather\City;
use App\Services\Weather\WeatherInterfaceAdapter;

/**
 * Class API
 * @package App\Services\OpenWeatherMap\v1
 */
class API implements WeatherInterfaceAdapter
{
    /**
     * OpenWeatherMap url api
     * @var string
     */
    protected $url;

    /**
     * Yandex API token
     * @var string
     */
    private $_apiKey;

    public function __construct(string $url, string $apiKey)
    {
        $this->url = $url;
        $this->_apiKey = $apiKey;
    }

    public function getCurrentTemp(City $city)
    {
        return 0;
    }
}