<?php

use Faker\Generator as Faker;
use App\Models\Order\Order;
use Carbon\Carbon;

$factory->define(Order::class, function (Faker $faker) {
    $createdAt = Carbon::now()->subDays(rand(0, 4));
    $status = array_keys(Order::getStatuses())[rand(0,2)];

    return [
        'status' => $status,
        'client_email' => $faker->email,
        'partner_id' => optional(\App\Models\Partner\Partner::get()->random(1)->first())->id,
        'delivery_dt' => $createdAt->copy()->addHours(rand(6,50)),
        'created_at' => $createdAt,
        'updated_at' => $createdAt->copy()->addHours(rand(1,5)),
    ];
});
