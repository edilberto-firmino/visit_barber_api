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
        Schema::create('cuts_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barber');
            $table->unsignedBigInteger('id_type_cut');
            $table->string('title_cuts');
            $table->integer('value_cut');
            $table->time('time_cut');
            $table->timestamps();

            $table->foreign('id_type_cut')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuts_types');
    }
};
