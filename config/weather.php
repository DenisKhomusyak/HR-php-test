<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Weather Source
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default weather source api that should be used
    | by the framework. The "default" yandex tech, as well as a variety of cloud
    | based weather sources are available to your application. Just store away!
    |
    */

    'default' => env('WEATHER_DEFAULT', 'yandex'),

    'weather_sources' => [
        'yandex' => [
            'api_class' => App\Services\Weather\WeatherSource\Yandex\v1\API::class,
            'base_url' => env('WEATHER_YANDEX_API_URL', 'https://api.weather.yandex.ru/v1/'),
            'api_key' => env('WEATHER_YANDEX_API_KEY', null),
            'cache' => 600,
        ],
        'owm' => [
            'api_class' => '',
            'base_url' => env('OPEN_WEATHER_MAP_API_URL', 'http://api.openweathermap.org/data/2.5/'),
            'api_key' => env('OPEN_WEATHER_MAP_API_KEY', null),
            'cache' => 60
        ],
    ],
];