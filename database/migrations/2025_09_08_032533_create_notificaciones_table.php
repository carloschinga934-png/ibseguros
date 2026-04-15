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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tipo'); // reclamacion, renovacion, mensaje, etc.
            $table->string('titulo');
            $table->text('contenido');
            $table->string('estado')->default('no_leida'); // no_leida, leida, archivada
            $table->string('prioridad')->default('normal'); // baja, normal, alta, urgente
            $table->string('numero_referencia')->nullable(); // para reclamaciones o pólizas
            $table->timestamp('fecha_notificacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};