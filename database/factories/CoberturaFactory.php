<?php

namespace Database\Factories;

use App\Models\Cobertura;
use App\Models\PolizaSalud;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoberturaFactory extends Factory
{
    protected $model = Cobertura::class;

    public function definition(): array
    {
        $nombres = [
            'Consultas médicas', 'Hospitalización', 'Medicamentos', 
            'Cirugías', 'Emergencias', 'Tratamientos oncológicos',
            'Exámenes de laboratorio', 'Radiografías', 'Terapias físicas',
            'Atención dental', 'Atención oftalmológica'
        ];
        
        $limites = [
            'S/. 5,000 anuales', 'S/. 10,000 anuales', 'S/. 20,000 anuales',
            'S/. 50,000 anuales', 'S/. 100,000 anuales', 'Cobertura al 80%',
            'Cobertura al 90%', 'Cobertura al 100%', 'Hasta 10 consultas anuales'
        ];
        
        return [
            'poliza_id' => PolizaSalud::factory(),
            'nombre' => $this->faker->randomElement($nombres),
            'descripcion' => $this->faker->sentence(),
            'limite' => $this->faker->randomElement($limites),
        ];
    }
}