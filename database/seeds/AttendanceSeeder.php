<?php

use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//App\Attendance::truncate();
        factory(App\Attendance::class,100)->create();
    }
}
