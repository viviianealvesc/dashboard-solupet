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
        Schema::create('materiais', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('descricao');
            $table->string('tipo_material', 50);
            $table->unsignedBigInteger('id_dose')->nullable();
            $table->timestamps();

            $table->foreign('id_dose')->references('id')->on('doses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiais');
    }
};
