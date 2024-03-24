<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardTable extends Migration
{
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->id();
            $table->integer('board_number');
            $table->integer('board_status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('board');
    }
}