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
        Schema::create('bancas', function (Blueprint $table) {
            $table->id();
            $table->boolean('ativo')->default(true);
            $table->foreignId('id_orientadores')->constrained('orientadores')->onDelete('cascade');
            $table->foreignId('id_titulos')->constrained('titulos')->onDelete('cascade');
            $table->string('nr_banca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancas');
    }
};
