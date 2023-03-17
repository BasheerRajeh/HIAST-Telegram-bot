<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelegramCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegram_commands', function (Blueprint $table) {
            $table->id();
            $table->string('command_id')->unique()->nullable(false);
            $table->string('parent_id');
            $table->string('name');
            $table->boolean('is_leaf')->default(false);
            $table->integer('take_params')->default(0);
            $table->boolean('is_parameter')->default(false);
            $table->longText('description');
            $table->timestamps();
        });
        Schema::table('telegram_commands',function (Blueprint $table){
            $table->foreign('parent_id')->references('command_id')->on('telegram_commands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telegram_commands');
    }
}
