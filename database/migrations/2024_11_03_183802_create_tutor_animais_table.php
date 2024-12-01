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
        Schema::create('tutor_animais', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tutor');
            $table->unsignedBigInteger('id_animal');

            $table->primary(['id_tutor', 'id_animal']);
            $table->timestamps();

            $table->foreign('id_tutor')->references('id')->on('tutores')->onDelete('cascade');
            $table->foreign('id_animal')->references('id')->on('animais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_animais');
    }
};
