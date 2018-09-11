<?php

use Faker\Generator as Faker;

$factory->define(App\Setting::class, function (Faker $faker) {
    return [
        'year' => $faker->year(),
        'study' => $faker->word(),
        'stage' => $faker->word(),
        'branch' => $faker->word(),
        'case_type' => $faker->word(),
        'subject_type' => $faker->word(),
        'hours' => $faker->numberBetween(1,4),
    ];
});
