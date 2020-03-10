<?php

use Illuminate\Database\Seeder;
use App\Models\Order\OrderProduct;

class OrdersProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderProduct::class, 1000)->create();
    }
}
