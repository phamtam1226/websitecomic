<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('comic_id');
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }
    
    
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
