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
        Schema::create('doses', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('descricao_reduzida');
            $table->string('sigla', 10);
            $table->string('numero_repeticoes', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doses');
    }
};
