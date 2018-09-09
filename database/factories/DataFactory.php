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


$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'level_id' => function() {
        	return factory('App\Level')->create()->id;
        },
        'hours' => $faker->numberBetween(1,4),
        'subject_type' => $faker->boolean(),
    ];
});

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'level_id' => function() {
        	return factory('App\Level')->create()->id;
        },
    ];
});

$factory->define(App\Subject_Pass::class, function (Faker $faker) {
    return [
        'hours_count' => $faker->numberBetween(1,20),
        'subject_id' => function() {
        	return factory('App\Subject')->create()->id;
        },
    ];
});

$factory->define(App\Special_Case::class, function (Faker $faker) {
    return [
        'case_type' => $faker->boolean(),
        'student_id' => function() {
        	return factory('App\Student')->create()->id;
        },
        'subject_id' => function() {
        	return factory('App\Subject')->create()->id;
        },
    ];
});


$factory->define(App\Attendance::class, function (Faker $faker) {
    return [
        'status' => $faker->boolean(),
        'allow' => $faker->boolean(),
        'date' => $faker->date(),
        'subject_id' => function() {
        	return factory('App\Subject')->create()->id;
        },
        'level_id' => function() {
        	return factory('App\Level')->create()->id;
        },
        'student_id' => function() {
        	return factory('App\Student')->create()->id;
        },
    ];
});