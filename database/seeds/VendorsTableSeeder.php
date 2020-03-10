<?php

use Illuminate\Database\Seeder;
use App\Models\Vendor\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vendor::class, 10)->create();
    }
}
