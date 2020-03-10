<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'weather' => [
        'default' => [
            'base_url' => env('WEATHER_YANDEX_API_URL', 'https://api.weather.yandex.ru/v1/'),
            'api_key' => env('WEATHER_YANDEX_API_KEY', null)
        ],
        'openweathermap' => [
            'base_url' => env('OPEN_WEATHER_MAP_API_URL', 'http://api.openweathermap.org/data/2.5/'),
            'api_key' => env('OPEN_WEATHER_MAP_API_KEY', null)
        ]
    ],

];
