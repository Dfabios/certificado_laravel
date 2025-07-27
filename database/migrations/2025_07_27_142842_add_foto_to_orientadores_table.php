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
        Schema::table('orientadores', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('nome_orientador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orientadores', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
