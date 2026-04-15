<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notificacion;
use App\Models\HistorialMedico;
use App\Models\PolizaSalud;
use App\Models\Cobertura;
use App\Models\AtencionMedica;
use Illuminate\Database\Seeder;

class MedicoNotificacionSeeder extends Seeder
{
    /**
     * Ejecuta el seeder para generar datos de prueba.
     */
    public function run(): void
    {
        // Crear 10 usuarios tipo cliente
        $usuarios = User::factory()
            ->count(10)
            ->create([
                'tipo' => 'cliente'
            ]);
            
        // Para cada usuario, crear un historial médico
        $usuarios->each(function ($usuario) {
            // Crear historial médico para el usuario
            $historial = HistorialMedico::factory()->create([
                'user_id' => $usuario->id
            ]);
            
            // Crear 1-3 pólizas para cada historial médico
            $polizas = PolizaSalud::factory()
                ->count(rand(1, 3))
                ->create([
                    'historial_medico_id' => $historial->id
                ]);
                
            // Para cada póliza, crear 2-5 coberturas
            $polizas->each(function ($poliza) {
                Cobertura::factory()
                    ->count(rand(2, 5))
                    ->create([
                        'poliza_id' => $poliza->id
                    ]);
                    
                // Para cada póliza, crear 1-8 atenciones médicas
                AtencionMedica::factory()
                    ->count(rand(1, 8))
                    ->create([
                        'poliza_id' => $poliza->id
                    ]);
            });
            
            // Crear 3-8 notificaciones para cada usuario
            Notificacion::factory()
                ->count(rand(3, 8))
                ->create([
                    'user_id' => $usuario->id
                ]);
        });
    }
}