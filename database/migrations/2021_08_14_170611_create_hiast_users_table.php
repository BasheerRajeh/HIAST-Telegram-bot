<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiastUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiast_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique()->nullable(false);
            $table->string('username')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('resturant_password')->nullable(false);
            $table->integer('type');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hiast_users');
    }
}
