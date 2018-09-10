<?php

use Faker\Generator as Faker;


$factory->define(App\Attendance::class, function (Faker $faker) {
    return [
        'status' => $faker->boolean(),
        'allow' => $faker->boolean(),
        'date' => $faker->date(),
        'subject_id' => App\Subject::find($faker->numberBetween(1,50))->id,
        //'level_id' => App\Level::find($faker->numberBetween(1,10))->id,
        'student_id' =>  App\Student::find($faker->numberBetween(1,50))->id,
        'subject_teacher_id' => App\SubjectTeacher::find($faker->numberBetween(1,50))->id,
    ];
});