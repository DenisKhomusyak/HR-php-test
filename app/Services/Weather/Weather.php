<?php

namespace App\Services\Weather;

use App\Services\Weather\City\Contracts\CityInterface;
use App\Services\Weather\WeatherSource\WeatherSourceAdapter;
use Illuminate\Support\Facades\Cache;
use Mockery\Exception;

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
     * @var WeatherSourceAdapter|null
     */
    public $weatherSource = null;

    /**
     * @var CityInterface|null
     */
    public $city = null;

    /**
     * Weather constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;

        $this->setDefaultWeatherSource();
    }

    /**
     * Set default weather source
     */
    public function setDefaultWeatherSource() : void
    {
        $default = $this->config['default'];
        $weatherSourceDefaultConfig = $this->config['weather_sources'][$default] ?? null;

        if ($weatherSourceDefaultConfig === null) {
            throw new Exception('not found default weather config');
        }

        $weatherSourceDefault = $weatherSourceDefaultConfig['api_class'];

        $this->setWeatherSource(new $weatherSourceDefault($weatherSourceDefaultConfig));
    }

    /**
     * @param CityInterface $city
     */
    public function setCity(CityInterface $city) : void
    {
        $this->city = $city;
    }

    /**
     * @return CityInterface|null
     */
    public function getCity() : ?CityInterface
    {
        return $this->city;
    }

    /**
     * Get temperature in city
     * @return string|null
     */
    public function getTemp() : ?string
    {
        // todo refactor
        return Cache::remember($this->getCacheName(), $this->getCacheTimeService(), function () {
            return $this->weatherSource->getCurrentTempCity($this->city);
        });
    }

    /**
     * Change weatherApi
     * @param WeatherSourceAdapter $weatherInterfaceAdapter
     */
    public function setWeatherSource(WeatherSourceAdapter $weatherInterfaceAdapter) : void
    {
        $this->weatherSource = $weatherInterfaceAdapter;
    }

    /**
     * Name of current WeatherSource
     * @return string
     */
    public function getNameService()
    {
        return $this->weatherSource->getName();
    }

    /**
     * @return int
     */
    public function getCacheTimeService()
    {
        return $this->weatherSource->getCacheTime();
    }

    public function getCacheName()
    {
        return 'weather:' . $this->getCity()->getName() . ':' . $this->weatherSource->getName() . ':' . time();
    }
}