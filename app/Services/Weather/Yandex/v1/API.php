<?php

namespace App\Services\Weather\Yandex\v1;

use App\Services\Weather\City;
use App\Services\Weather\WeatherInterfaceAdapter;

/**
 * Class API
 * @package App\Services\Weather\Yandex\v1
 */
class API implements WeatherInterfaceAdapter
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
     * @param string $url
     * @param string $apiKey
     * @param City $city
     */
    public function __construct(string $url, string $apiKey)
    {
        $this->url = $url;
        $this->_apiKey = $apiKey;
    }

    /**
     * @param City $city
     * @return string
     * @throws \Exception
     */
    public function getCurrentTemp(City $city) : string
    {
        $resultsArray = $this->sendRequest('forecast', [
            'lat' => $city->getLat(),
            'lon' => $city->getLon()
        ]);

        return $resultsArray['fact']['temp'] ?? '';
    }

    /**
     * @return string
     */
    private function getApiKey() : string
    {
        return $this->_apiKey;
    }

    /**
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     * @throws \Exception
     */
    protected function sendRequest(string $method, array $params = [], array $headers = [])
    {
        $url = $this->url . $method . '?' . http_build_query($params);
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