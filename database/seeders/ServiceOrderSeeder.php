<?php

namespace Database\Seeders;

use App\Models\ServiceOrder;
use Illuminate\Database\Seeder;

class ServiceOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceOrder::factory(5)->create();
    }
}
