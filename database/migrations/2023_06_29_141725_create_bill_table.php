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
            $table->integer('coin');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
         
        Schema::create('chapter_bill', function (Blueprint $table) {
            $table->id();
            $table->integer('coin');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chapter_id');
            $table->timestamps();
            
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
           
        });
        
    }
    
    
    public function down()
    { 
        Schema::dropIfExists('bill');
        Schema::dropIfExists('chapter_bill');
    }
}
