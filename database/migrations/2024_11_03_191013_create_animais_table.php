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
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->unsignedBigInteger('id_tutor')->nullable();
            $table->unsignedBigInteger('id_raca')->nullable();
            $table->unsignedBigInteger('id_especie')->nullable();
            $table->timestamps();

            $table->foreign('id_tutor')->references('id')->on('tutores')->onDelete('set null');
            $table->foreign('id_raca')->references('id')->on('racas')->onDelete('set null');
            $table->foreign('id_especie')->references('id')->on('especies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animais');
    }
};
