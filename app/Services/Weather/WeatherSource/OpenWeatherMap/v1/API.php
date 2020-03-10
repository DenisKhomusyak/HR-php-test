<?php

namespace App\Services\Weather\WeatherSource\OpenWeatherMap\v1;


use App\Services\Weather\City\Contracts\CityInterface;
use App\Services\Weather\WeatherSource\Requester;
use App\Services\Weather\WeatherSource\WeatherSourceAdapter;
use Illuminate\Support\Arr;

/**
 * Class API
 * @package App\Services\OpenWeatherMap\v1
 */
class API implements WeatherSourceAdapter, Requester
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

    /**
     * API constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->url = Arr::get($config, 'base_url');
        $this->_apiKey = Arr::get($config, 'api_key');
    }

    /**
     * @return string
     */
    private function getApiKey() : string
    {
        return $this->_apiKey;
    }

    /**
     * @param CityInterface $city
     * @return string
     * @throws \Exception
     */
    public function getCurrentTempCity(CityInterface $city) : string
    {
        $response = $this->sendRequest(Requester::GET, 'weather', [
            'q' => $city->getName()
        ]);

        return $response['main']['temp'] ?? '';
    }

    /**
     * @param string $method
     * @param string $action
     * @param array $params
     * @param array $headers
     * @return array|mixed
     * @throws \Exception
     */
    public function sendRequest(string $method = Requester::GET, string $action = '', array $params = [], array $headers = [])
    {
        $params = array_merge($params, [
            'APPID' => $this->getApiKey(),
            'units' => 'metric'
        ]);

        $url = $this->url . $action . '?' . http_build_query($params);
        $cUrl = curl_init($url);

        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($cUrl);
        $cUrlErrors = curl_error($cUrl);
        curl_close($cUrl);

        if ($cUrlErrors) {
            throw new \Exception('Bad request weather API(yandex) ' . $cUrlErrors);
        }

        return json_decode($response, true);
    }
}