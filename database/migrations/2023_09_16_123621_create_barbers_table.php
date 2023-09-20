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
        Schema::create('barbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barber_id');
            $table->string('name_barber');
            $table->string('cpf_barber');
            $table->string('cnpj_barber');
            $table->string('number_cell_barber');
            $table->string('email_barber')->unique();
            $table->string('pass_barber');
            $table->timestamps();


            //foreign key ('id_barber -> title_cuts')
            $table->foreign('barber_id')->references('id')->on('cut_galleries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbers');
    }
};
