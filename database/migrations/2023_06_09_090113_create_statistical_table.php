<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticalTable extends Migration
{
    public function up()
    {
        Schema::create('statistical', function (Blueprint $table) {
            $table->id();

            $table->string('order_date');
            $table->integer('sales');
            $table->integer('profit');
            $table->integer('quantity');
            $table->integer('total_order');
            $table->timestamps();

        });
    }
    public function down()
    {
        Schema::dropIfExists('statistical');
    }
}
