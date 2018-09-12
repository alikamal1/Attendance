<?php

use Faker\Generator as Faker;

$factory->define(App\Level::class, function (Faker $faker) {
    return [
        'year' => App\Setting::where('name','سنة')->inRandomOrder()->first()->value,
        'study' => App\Setting::where('name','دراسة')->inRandomOrder()->first()->value,
        'stage' => App\Setting::where('name','مرحلة')->inRandomOrder()->first()->value,
        'branch' => App\Setting::where('name','تخصص')->inRandomOrder()->first()->value,
    ];
});

