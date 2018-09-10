<?php

use Illuminate\Database\Seeder;

class SubjectPassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//App\Subject_Pass::truncate();
        factory(App\SubjectPass::class,50)->create();
    }
}
