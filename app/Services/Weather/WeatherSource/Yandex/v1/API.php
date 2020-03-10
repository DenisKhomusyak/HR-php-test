<?php

namespace App\Services\Weather\WeatherSource\Yandex\v1;

use App\Services\Weather\City\Contracts\CityInterface;
use App\Services\Weather\WeatherSource\Requester;
use App\Services\Weather\WeatherSource\WeatherSourceAdapter;
use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;

/**
 * Class API
 * @package App\Services\Weather\Yandex\v1
 */
class API implements WeatherSourceAdapter, Requester
{
    /**
     * Yandex url api
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
     * @param CityInterface $city
     * @return string
     * @throws \Exception
     */
    public function getCurrentTempCity(CityInterface $city) : string
    {
        $response = $this->sendRequest(Requester::GET, 'forecast', [
            'lat' => $city->getLat(),
            'lon' => $city->getLon(),
            'lang' => 'ru_RU',
            'limit' => 1,
            'hours' => false,
            'extra' => false,
        ]);

        return $response['fact']['temp'] ?? '';
    }

    /**
     * @return string
     */
    private function getApiKey() : string
    {
        return $this->_apiKey;
    }

    public function sendRequest(string $method = Requester::GET, string $action = '', array $params = [], array $headers = [])
    {
        $url = $this->url . $action . '?' . http_build_query($params);
        $cUrl = curl_init($url);

        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cUrl, CURLOPT_HTTPHEADER, ["X-Yandex-API-Key:" . $this->getApiKey()]);

        $response = curl_exec($cUrl);
        $cUrlErrors = curl_error($cUrl);
        curl_close($cUrl);

        if ($cUrlErrors) {
            throw new \Exception('Bad request weather API(yandex) ' . $cUrlErrors);
        }

        return json_decode($response, true);
    }
}