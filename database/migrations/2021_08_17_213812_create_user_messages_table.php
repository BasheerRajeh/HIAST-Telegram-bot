<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('parent_id');
            $table->string('message_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('telegram_users')->onDelete('cascade');
            $table->foreign('parent_id')->references('command_id')->on('telegram_commands')->onDelete('cascade');
            $table->foreign('message_id')->references('command_id')->on('telegram_commands')->onDelete('cascade');

        });

        // Schema::table('user_messages', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('telegram_users')->onDelete('cascade');
        //     $table->foreign('parent_id')->references('command_id')->on('telegram_commands')->onDelete('cascade');
        //     $table->foreign('message_id')->references('command_id')->on('telegram_commands')->onDelete('cascade');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_messages');
    }
}
