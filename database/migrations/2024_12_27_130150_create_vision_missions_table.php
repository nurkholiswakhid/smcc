<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisionMissionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->text('vision');
            $table->text('mission');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vision_missions');
    }
}

