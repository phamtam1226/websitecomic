<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comic_id');
            $table->string('chapter_name');
            $table->timestamps();

            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('cascade');
        });

        Schema::create('chapter_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_id');
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('chapter_images');
        Schema::dropIfExists('chapters');
    }
}
