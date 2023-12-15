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
        Schema::create('rundowns', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date');
            $table->dateTime('date_of_akad');
            $table->dateTime('date_of_resepsi');
            $table->dateTime('date_of_unduh_mantu')->nullable();
            $table->string('time_of_akad');
            $table->string('addres_of_akad');
            $table->string('time_of_resepsi');
            $table->string('addres_of_resepsi');
            $table->string('time_of_unduh_mantu')->nullable();
            $table->string('addres_of_unduh_mantu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rundowns');
    }
};
