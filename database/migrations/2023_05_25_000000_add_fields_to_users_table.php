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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'dni')) {
                $table->string('dni', 8)->unique()->after('email');
            }
            
            if (!Schema::hasColumn('users', 'tipo')) {
                $table->string('tipo')->default('cliente')->after('dni');
            }
            
            if (!Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono', 9)->nullable()->after('tipo');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dni', 'tipo', 'telefono']);
        });
    }
};