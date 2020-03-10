<?php

use Faker\Generator as Faker;
use App\Models\Product\Product;
use App\Models\Vendor\Vendor;

$factory->define(Product::class, function (Faker $faker) {
    static $index = 0;
    return [
        'name' => 'Product_' . ++$index,
        'price' => $faker->numberBetween(100, 1000),
        'vendor_id' => optional(Vendor::get()->random(1)->first())->id,
    ];
});
