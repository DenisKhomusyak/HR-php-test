<?php

use Illuminate\Database\Seeder;
use App\Models\Partner\Partner;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Partner::class, 20)->create();
    }
}
