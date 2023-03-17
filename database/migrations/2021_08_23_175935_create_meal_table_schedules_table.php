<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealTableSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_table_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('breakfast_id');
            $table->integer('lunch_id');
            $table->integer('dinner_id');
            $table->foreign('breakfast_id')->references('meal_id')->on('meals')->onDelete('cascade');
            $table->foreign('lunch_id')->references('meal_id')->on('meals')->onDelete('cascade');
            $table->foreign('dinner_id')->references('meal_id')->on('meals')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_table_schedules');
    }
}
