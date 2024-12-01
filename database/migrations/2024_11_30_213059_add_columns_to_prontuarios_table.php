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
        Schema::table('prontuarios', function (Blueprint $table) {
            $table->string('motivoConsulta');
            $table->string('sinaisClinicos');
            $table->string('prescricao');
            $table->string('procedimentosRealizados');
            $table->string('observacoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prontuarios', function (Blueprint $table) {
            $table->dropColumn('motivoConsulta');
            $table->dropColumn('sinaisClinicos');
            $table->dropColumn('prescricao');
            $table->dropColumn('procedimentosRealizados');
            $table->dropColumn('observacoes');
        });
    }
};
