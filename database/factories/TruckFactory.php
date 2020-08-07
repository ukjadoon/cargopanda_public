<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use App\Truck;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Truck::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'organization_id' => Organization::inRandomOrder()->first()->id,
    ];
});
