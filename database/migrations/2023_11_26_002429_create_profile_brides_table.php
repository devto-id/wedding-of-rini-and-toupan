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
        Schema::create('profile_brides', function (Blueprint $table) {
            $table->id();
            $table->string('photo_groom');
            $table->string('photo_bride');
            $table->string('first_name_bride');
            $table->string('last_name_bride');
            $table->string('first_name_groom');
            $table->string('last_name_groom');
            $table->string('son_of');
            $table->string('daughter_of');
            $table->string('hometown_bride');
            $table->string('hometown_groom');
            $table->string('ig_groom');
            $table->string('ig_bride');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_brides');
    }
};
