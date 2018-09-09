<?php

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //App\Subject::truncate();
        factory(App\Subject::class,10)->create();
        factory(App\Student::class,10)->create();
        factory(App\Subject_Pass::class,10)->create();
        factory(App\Attendance::class,10)->create();


    }
}
