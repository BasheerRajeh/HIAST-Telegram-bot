<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->integer('student_id');
            $table->decimal('mark',3,2);
            $table->foreign('course_id')->references('command_id')->on('telegram_commands')->onDelete('cascade');//string('course_id');
            $table->foreign('student_id')->references('user_id')->on('hiast_users')->onDelete('cascade');//integer('student_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_marks');
    }
}
