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
        Schema::create('historial_medico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('polizas_salud', function (Blueprint $table) {
            $table->id();
            $table->foreignId('historial_medico_id')->constrained('historial_medico')->onDelete('cascade');
            $table->string('numero_poliza');
            $table->string('tipo_seguro'); // Salud, Oncológico, EPS, etc.
            $table->string('estado')->default('activo'); // activo, vencido, cancelado
            $table->date('fecha_contratacion');
            $table->date('fecha_vencimiento');
            $table->decimal('prima_anual', 10, 2);
            $table->timestamps();
        });

        Schema::create('coberturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poliza_id')->constrained('polizas_salud')->onDelete('cascade');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('limite');
            $table->timestamps();
        });

        Schema::create('atenciones_medicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poliza_id')->constrained('polizas_salud')->onDelete('cascade');
            $table->date('fecha');
            $table->string('tipo'); // Consulta, Emergencia, Hospitalización, etc.
            $table->string('centro_medico');
            $table->string('diagnostico');
            $table->decimal('monto', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atenciones_medicas');
        Schema::dropIfExists('coberturas');
        Schema::dropIfExists('polizas_salud');
        Schema::dropIfExists('historial_medico');
    }
};