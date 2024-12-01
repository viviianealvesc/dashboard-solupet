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
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_prontuario')->default(now());
            $table->string('diagnostico');
            $table->unsignedBigInteger('id_animal')->nullable();
            $table->unsignedBigInteger('id_veterinario')->nullable();
            $table->timestamps();

            $table->foreign('id_animal')->references('id')->on('animais')->onDelete('set null');
            $table->foreign('id_veterinario')->references('id')->on('veterinarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prontuarios');
    }
};
