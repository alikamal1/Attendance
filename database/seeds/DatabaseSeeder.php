<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(TeacherSeeder::class);

        $this->call(SubjectSeeder::class);
        $this->call(StudentSeeder::class);

        $this->call(SubjectPassSeeder::class);
        $this->call(SpecialCaseSeeder::class);

        $this->call(SubjectTeacherSeeder::class);

        $this->call(AttendanceSeeder::class);

        $this->call(SettingSeeder::class);

    }
}
