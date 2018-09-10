<?php

use Illuminate\Database\Seeder;

class SpecialCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //App\Special_Case::truncate();
    	factory(App\SpecialCase::class,50)->create();
    }
}
