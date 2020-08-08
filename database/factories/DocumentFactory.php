<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text, 
        'type' => collect(['truck_doc', 'organization_doc'])->random(1)->first()
    ];
});
