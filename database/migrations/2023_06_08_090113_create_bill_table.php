<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->id();

            $table->string('status')->nullable();

            $table->unsignedBigInteger('board_id');
            $table->integer('totalprice');

            $table->timestamps();

            $table->foreign('board_id')->references('id')->on('board')->onDelete('cascade');
        });
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bill')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill');
        Schema::dropIfExists('bill_detail');
    }
}
