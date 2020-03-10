<?php

use Faker\Generator as Faker;
use \App\Models\Vendor\Vendor;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'email' => $faker->unique()->email
    ];
});
