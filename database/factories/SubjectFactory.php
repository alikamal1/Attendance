<?php

use Faker\Generator as Faker;

/*'level_id' => function() {
            return factory('App\Level')->create()->id;
        },*/

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'level_id' => App\Level::find($faker->numberBetween(1,20))->id,
        'hours' => $faker->numberBetween(1,4),
        'subject_type' => $faker->boolean(),
    ];
});

