<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('password')->unique();
            $table->string('email')->unique();
            $table->integer('role');
            $table->string('avatar')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }
     /*
    CREATE TABLE user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
        password VARCHAR(255) NOT NULL
        email VARCHAR(255) NOT NULL
        role INT(11)
        avatar VARCHAR(255) 
        status INT(11)
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

        
    );
    */
    
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
