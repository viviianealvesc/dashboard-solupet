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
        Schema::create('racas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_raca', 50);
            $table->unsignedBigInteger('id_especie')->nullable();
            $table->timestamps();

            $table->foreign('id_especie')->references('id')->on('especies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racas');
    }
};
