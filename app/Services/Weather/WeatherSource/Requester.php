<?php

namespace App\Services\Weather\WeatherSource;

/**
 * Interface Requester
 * @package App\Services\Weather\WeatherSource
 */
interface Requester
{
    public const GET = 'get';
    public const POST = 'post';

    /**
     * @param string $method
     * @param string $action
     * @param array $params
     * @param array $headers
     * @return array
     */
    public function sendRequest(string $method = Requester::GET, string $action = '', array $params = [], array $headers = []);
}