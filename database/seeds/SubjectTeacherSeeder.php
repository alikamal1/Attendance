<?php

use Illuminate\Database\Seeder;

class SubjectTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //App\SubjectTeacher::truncate();
        factory(App\SubjectTeacher::class,50)->create();
    }
}
