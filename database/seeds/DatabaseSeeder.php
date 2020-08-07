<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'production') {
            $this->call(OrganizationSeeder::class);
            $this->call(TruckSeeder::class);
        }
        $this->call(UserSeeder::class);
    }
}
