<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cut_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barber');
            $table->unsignedBigInteger('id_cut');
            $table->string('title_cuts');
            $table->string('path_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cut_galleries');
    }
};
