<?php

use Faker\Generator as Faker;

$factory->define(App\SpecialCase::class, function (Faker $faker) {
    return [
        'case_type' => $faker->boolean(),
        'student_id' =>  App\Student::find($faker->numberBetween(1,50))->id,
        'subject_id' => App\Subject::find($faker->numberBetween(1,50))->id,
    ];
});
