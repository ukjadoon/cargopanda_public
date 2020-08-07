<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DocumentDefinition;
use Faker\Generator as Faker;

$factory->define(DocumentDefinition::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text, 
        'type' => collect(['truck_doc', 'organization_doc'])->random(1)->first()
    ];
});
