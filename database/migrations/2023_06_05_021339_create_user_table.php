<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_cccd');
            $table->string('user_email')->unique();
            $table->integer('user_gender');
            $table->string('user_phone')->nullable();
            $table->string('user_avatar')->nullable();
            $table->string('user_address')->nullable();
            $table->date('user_birthday')->nullable();
            $table->date('user_datestart')->nullable();
            $table->integer('user_position')->nullable();
            $table->timestamps();
        });
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            $table->integer('status')->nullable();
            $table->integer('role');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('account');
    }
}
