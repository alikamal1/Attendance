<?php

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
    ];
});
