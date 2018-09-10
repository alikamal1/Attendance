<?php

use Faker\Generator as Faker;

$factory->define(App\Level::class, function (Faker $faker) {
    return [
        'year' => $faker->year(),
        'study' => $faker->word(),
        'stage' => $faker->word(),
        'branch' => $faker->word(),
    ];
});

