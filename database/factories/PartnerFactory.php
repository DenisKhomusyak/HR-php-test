<?php

use Faker\Generator as Faker;
use App\Models\Partner\Partner;

$factory->define(Partner::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->email,
        'name' => $faker->unique()->company,
    ];
});
