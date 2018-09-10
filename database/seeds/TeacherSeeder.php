<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //App\Teacher::truncate();
        factory(App\Teacher::class,20)->create();
    }
}
