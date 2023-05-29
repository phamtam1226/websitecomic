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
            $table->json('images');
            $table->timestamps();

            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('cascade');
        });
    }

    /*
    CREATE TABLE chapters (
        id INT AUTO_INCREMENT PRIMARY KEY,
        comic_id INT,
        chapter_name VARCHAR(255) NOT NULL,
        images TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (comic_id) REFERENCES comics(id)
    );
    */
    
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
