<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoItemsTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up()
    {
        Schema::create('video_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Video title
            $table->string('url'); // YouTube URL
            $table->text('description')->nullable(); // Description of the video
            $table->timestamps(); // Created and updated timestamps
        });
    }


    /**
     * Hapus tabel jika dibatalkan.
     */
    public function down()
    {
        Schema::dropIfExists('video_items');
    }
}
