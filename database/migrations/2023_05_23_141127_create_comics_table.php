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
            $table->unsignedBigInteger('genre_id');
            $table->text('description')->nullable();
            $table->string('status');
            $table->string('cover_image');
            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /*
    CREATE TABLE comics (
        id INT AUTO_INCREMENT PRIMARY KEY,
        comic_name VARCHAR(255) NOT NULL,
        genre_id INT,
        description TEXT,
        status VARCHAR(255),
        cover_image VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (genre_id) REFERENCES genres(id)
    );
    */

    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
