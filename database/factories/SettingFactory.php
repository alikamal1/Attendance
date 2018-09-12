<?php

use Faker\Generator as Faker;

$factory->define(App\Setting::class, function (Faker $faker) {
    $setting = ['سنة','دراسة','مرحلة','تخصص','مادة','ساعة','اجازة'];
    
    $study = ['صباحي','مسائي'];
    $stage = ['المرحلة الاولى','المرحلة الثانية','المرحلة الثالثة','المرحلة الرابعة'];
    $branch = ['الشبكات','المعلومات'];
    $subject_type = ['كورس','فصلي'];
    $allow = ['اجازة','تفرغ'];
    
    $randomNumber = $faker->numberBetween(0,6);
    
    $name = $setting[$randomNumber];
    switch($randomNumber)
    {
    case 0:
            {
              $value = $faker->numberBetween(2010,2016);
             } break;
    case 1:
            {
              $value = $study[$faker->numberBetween(0,1)];
             } break;
    case 2:
            {
              $value = $stage[$faker->numberBetween(0,3)];
             } break;
    case 3:
            {
              $value = $branch[$faker->numberBetween(0,1)];
             } break;
    case 4:
            {
              $value = $subject_type[$faker->numberBetween(0,1)];
             } break;
    case 5:
            {
              $value = $faker->numberBetween(1,4);
             } break;
    case 6:
            {
              $value = $allow[$faker->numberBetween(0,1)];
             } break;
    
    }

    return [
        'name' => $name,
        'value' => $value,
    ];
});