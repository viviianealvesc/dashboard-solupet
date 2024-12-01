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
        Schema::create('prontuario_materiais', function (Blueprint $table) {
            $table->unsignedBigInteger('id_prontuario');
            $table->unsignedBigInteger('id_material');

            $table->primary(['id_prontuario', 'id_material']);
            $table->timestamps();

            $table->foreign('id_prontuario')->references('id')->on('prontuarios')->onDelete('cascade');
            $table->foreign('id_material')->references('id')->on('materiais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prontuario_materiais');
    }
};
