<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'level_id' => App\Level::find($faker->numberBetween(1,20))->id,
    ];
});
