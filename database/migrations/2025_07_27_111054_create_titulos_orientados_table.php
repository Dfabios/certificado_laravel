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
        Schema::create('titulos_orientados', function (Blueprint $table) {
            $table->id();
            $table->boolean('ativo')->default(true);
            $table->foreignId('id_orientados')->constrained('orientados')->onDelete('cascade');
            $table->foreignId('id_titulos')->constrained('titulos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulos_orientados');
    }
};
