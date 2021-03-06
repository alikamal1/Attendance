<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_teacher_id')->unsigned();
            //$table->integer('level_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->boolean('status');
            $table->boolean('allow');
            $table->date('date');
            $table->timestamps();
        });

        Schema::table('attendances', function($table) {
            //$table->foreign('teacher_subject_id')->references('id')->on('teacher_subject')->onDelete('cascade');

            //$table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
