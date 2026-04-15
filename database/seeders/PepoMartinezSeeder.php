<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HistorialMedico;
use App\Models\PolizaSalud;
use App\Models\Cobertura;
use App\Models\AtencionMedica;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PepoMartinezSeeder extends Seeder
{
    /**
     * Ejecuta el seeder para generar datos de prueba para Pepo Martinez.
     */
    public function run(): void
    {
        // Crear usuario Pepo Martinez
        $usuario = User::create([
            'name' => 'Pepo Martinez',
            'email' => 'asd@gmail.com',
            'password' => Hash::make('asdasdasd'),
            'dni' => '12345678',
            'tipo' => 'cliente',
            'telefono' => '987654321', // Número de teléfono ficticio
            'email_verified_at' => now(),
        ]);
            
        // Crear historial médico para Pepo Martinez
        $historial = HistorialMedico::create([
            'user_id' => $usuario->id
        ]);
        
        // 1. Póliza de seguro básico
        $polizaBasica = PolizaSalud::create([
            'historial_medico_id' => $historial->id,
            'numero_poliza' => 'POL-BAS-001',
            'tipo_seguro' => 'Salud',
            'estado' => 'activo',
            'fecha_contratacion' => '2023-01-01',
            'fecha_vencimiento' => '2024-01-01',
            'prima_anual' => 1200.00,
        ]);
        
        // Coberturas para póliza básica
        $coberturasBasicas = [
            [
                'nombre' => 'Consultas médicas generales',
                'descripcion' => 'Cubre consultas con médicos generales y especialistas',
                'limite' => 'Hasta 12 consultas anuales'
            ],
            [
                'nombre' => 'Exámenes de laboratorio básicos',
                'descripcion' => 'Incluye análisis de sangre, orina y otros exámenes básicos',
                'limite' => 'Cobertura al 80%'
            ],
            [
                'nombre' => 'Medicamentos genéricos',
                'descripcion' => 'Cubre medicamentos genéricos recetados',
                'limite' => 'Hasta S/. 2,000 anuales'
            ]
        ];
        
        foreach ($coberturasBasicas as $cobertura) {
            Cobertura::create([
                'poliza_id' => $polizaBasica->id,
                'nombre' => $cobertura['nombre'],
                'descripcion' => $cobertura['descripcion'],
                'limite' => $cobertura['limite'],
            ]);
        }
        
        // 2. Póliza de seguro dental
        $polizaDental = PolizaSalud::create([
            'historial_medico_id' => $historial->id,
            'numero_poliza' => 'POL-DEN-002',
            'tipo_seguro' => 'Dental',
            'estado' => 'activo',
            'fecha_contratacion' => '2023-03-15',
            'fecha_vencimiento' => '2024-03-15',
            'prima_anual' => 500.00,
        ]);
        
        // Coberturas para póliza dental
        $coberturasDentales = [
            [
                'nombre' => 'Limpiezas dentales',
                'descripcion' => 'Limpiezas dentales profesionales',
                'limite' => '2 limpiezas anuales'
            ],
            [
                'nombre' => 'Revisiones periódicas',
                'descripcion' => 'Consultas de control con odontólogo',
                'limite' => 'Hasta 4 revisiones anuales'
            ],
            [
                'nombre' => 'Empastes simples',
                'descripcion' => 'Tratamiento de caries y empastes básicos',
                'limite' => 'Cobertura al 70%'
            ]
        ];
        
        foreach ($coberturasDentales as $cobertura) {
            Cobertura::create([
                'poliza_id' => $polizaDental->id,
                'nombre' => $cobertura['nombre'],
                'descripcion' => $cobertura['descripcion'],
                'limite' => $cobertura['limite'],
            ]);
        }
        
        // 3. Póliza de seguro de hospitalización
        $polizaHospitalizacion = PolizaSalud::create([
            'historial_medico_id' => $historial->id,
            'numero_poliza' => 'POL-HOS-003',
            'tipo_seguro' => 'Hospitalización',
            'estado' => 'activo',
            'fecha_contratacion' => '2023-06-01',
            'fecha_vencimiento' => '2024-06-01',
            'prima_anual' => 3000.00,
        ]);
        
        // Coberturas para póliza de hospitalización
        $coberturasHospitalizacion = [
            [
                'nombre' => 'Estancia hospitalaria',
                'descripcion' => 'Cubre gastos de habitación y alimentación durante hospitalización',
                'limite' => 'Hasta 30 días por año'
            ],
            [
                'nombre' => 'Cirugías programadas',
                'descripcion' => 'Cubre cirugías no urgentes programadas',
                'limite' => 'Cobertura al 90%'
            ],
            [
                'nombre' => 'Cuidados intensivos',
                'descripcion' => 'Atención en unidad de cuidados intensivos',
                'limite' => 'Hasta 10 días por año'
            ]
        ];
        
        foreach ($coberturasHospitalizacion as $cobertura) {
            Cobertura::create([
                'poliza_id' => $polizaHospitalizacion->id,
                'nombre' => $cobertura['nombre'],
                'descripcion' => $cobertura['descripcion'],
                'limite' => $cobertura['limite'],
            ]);
        }
        
        // Crear algunas atenciones médicas para cada póliza
        $atencionesBasicas = [
            [
                'fecha' => '2023-05-15',
                'tipo' => 'Consulta',
                'centro_medico' => 'Clínica San Pablo',
                'diagnostico' => 'Control preventivo',
                'monto' => 120.00
            ],
            [
                'fecha' => '2023-08-22',
                'tipo' => 'Examen',
                'centro_medico' => 'Clínica Internacional',
                'diagnostico' => 'Análisis de sangre',
                'monto' => 250.00
            ]
        ];
        
        foreach ($atencionesBasicas as $atencion) {
            AtencionMedica::create([
                'poliza_id' => $polizaBasica->id,
                'fecha' => $atencion['fecha'],
                'tipo' => $atencion['tipo'],
                'centro_medico' => $atencion['centro_medico'],
                'diagnostico' => $atencion['diagnostico'],
                'monto' => $atencion['monto'],
            ]);
        }
        
        $atencionesDentales = [
            [
                'fecha' => '2023-04-10',
                'tipo' => 'Consulta',
                'centro_medico' => 'Clínica Dental Sonrisa',
                'diagnostico' => 'Limpieza dental',
                'monto' => 150.00
            ]
        ];
        
        foreach ($atencionesDentales as $atencion) {
            AtencionMedica::create([
                'poliza_id' => $polizaDental->id,
                'fecha' => $atencion['fecha'],
                'tipo' => $atencion['tipo'],
                'centro_medico' => $atencion['centro_medico'],
                'diagnostico' => $atencion['diagnostico'],
                'monto' => $atencion['monto'],
            ]);
        }
        
        $atencionesHospitalizacion = [
            [
                'fecha' => '2023-09-05',
                'tipo' => 'Hospitalización',
                'centro_medico' => 'Hospital Rebagliati',
                'diagnostico' => 'Apendicitis',
                'monto' => 3500.00
            ]
        ];
        
        foreach ($atencionesHospitalizacion as $atencion) {
            AtencionMedica::create([
                'poliza_id' => $polizaHospitalizacion->id,
                'fecha' => $atencion['fecha'],
                'tipo' => $atencion['tipo'],
                'centro_medico' => $atencion['centro_medico'],
                'diagnostico' => $atencion['diagnostico'],
                'monto' => $atencion['monto'],
            ]);
        }
    }
}