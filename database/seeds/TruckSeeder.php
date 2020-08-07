<?php

use Illuminate\Database\Seeder;
use App\Truck;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Truck::class, 20)->create();
    }
}
