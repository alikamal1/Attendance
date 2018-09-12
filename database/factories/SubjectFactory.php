<?php

use Faker\Generator as Faker;

/*'level_id' => function() {
            return factory('App\Level')->create()->id;
        },*/

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'level_id' => $faker->numberBetween(1,20),
        'hours' => App\Setting::where('name','ساعة')->inRandomOrder()->first()->value,
        'subject_type' => App\Setting::where('name','مادة')->inRandomOrder()->first()->value,
    ];
});

