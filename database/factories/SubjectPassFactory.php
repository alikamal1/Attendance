<?php

use Faker\Generator as Faker;


$factory->define(App\SubjectPass::class, function (Faker $faker) {
    return [
        'hours_count' => $faker->numberBetween(1,20),
        'subject_id' =>  App\Subject::find($faker->numberBetween(1,20))->id,
    ];
});


