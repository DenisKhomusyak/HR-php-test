<?php

use Faker\Generator as Faker;
use App\Models\Order\OrderProduct;
use App\Models\Order\Order;
use App\Models\Product\Product;

$factory->define(OrderProduct::class, function (Faker $faker) {
    $order = Order::get()->random(1)->first();
    $product = Product::get()->random(1)->first();

    return [
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => $faker->numberBetween(1, 3),
        'price' => $product->price,
        'created_at' => $order->created_at,
        'updated_at' => $order->updated_at,
    ];
});
