<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterizedCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameterized_commands', function (Blueprint $table) {
            $table->id();
            $table->string('command_id');
            $table->boolean('take_ID')->default(false);
            $table->boolean('take_username')->default(false);
            $table->boolean('take_password')->default(false);
            $table->boolean('take_restaurant_password')->default(false);
            $table->timestamps();
            $table->foreign('command_id')->references('command_id')->on('telegram_commands')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameterized_commands');
    }
}
