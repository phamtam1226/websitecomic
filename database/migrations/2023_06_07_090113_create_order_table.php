<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->string('status')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('food_id');

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('account')->onDelete('cascade');
            $table->foreign('board_id')->references('id')->on('board')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order');
    }
}
