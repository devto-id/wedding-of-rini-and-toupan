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
        Schema::create('parents_of_brides', function (Blueprint $table) {
            $table->id();
            $table->string('name_dad_of_groom');
            $table->string('name_mom_of_groom');
            $table->string('name_dad_of_bride');
            $table->string('name_mom_of_bride');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents_of_brides');
    }
};
