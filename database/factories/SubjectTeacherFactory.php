<?php

use Faker\Generator as Faker;

$factory->define(App\SubjectTeacher::class, function (Faker $faker) {
    return [
        'subject_id' => App\Subject::find($faker->numberBetween(1,50))->id,
        'teacher_id' => App\teacher::find($faker->numberBetween(1,20))->id,
    ];
});
