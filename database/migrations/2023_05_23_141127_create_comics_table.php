<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('comic_name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('status');
            $table->string('cover_image');
            $table->integer('number_chapters');
            $table->integer('number_comments');
            $table->integer('number_views');
            $table->integer('number_follows');
            $table->integer('day_views');
            $table->integer('week_views');
            $table->integer('month_views');
            $table->timestamps();
        });
        

        /* tạo bảng trung gian giữa comics và genres để lưu các quan hệ nhiều-nhiều */

        Schema::create('comic_genre', function (Blueprint $table) {
            $table->unsignedBigInteger('comic_id');
            $table->unsignedBigInteger('genre_id');

            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');

            $table->primary(['comic_id', 'genre_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('comic_genre');
        Schema::dropIfExists('comics');
    }
}
