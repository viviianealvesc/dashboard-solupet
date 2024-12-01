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
        Schema::create('aplicacoes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_aplicacao')->default(now());
            $table->string('quantidade', 20);
            $table->string('numero_doses', 20);
            $table->unsignedBigInteger('id_veterinario')->nullable();
            $table->unsignedBigInteger('id_animal')->nullable();
            $table->unsignedBigInteger('id_material')->nullable();
            $table->unsignedBigInteger('id_dose')->nullable();
            $table->timestamps();

            $table->foreign('id_veterinario')->references('id')->on('veterinarios')->onDelete('set null');
            $table->foreign('id_animal')->references('id')->on('animais')->onDelete('set null');
            $table->foreign('id_material')->references('id')->on('materiais')->onDelete('set null');
            $table->foreign('id_dose')->references('id')->on('doses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplicacoes');
    }
};
