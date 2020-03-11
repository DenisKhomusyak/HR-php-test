<?php

use Illuminate\Database\Seeder;
use App\Models\Order\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 500)->create();
    }
}

