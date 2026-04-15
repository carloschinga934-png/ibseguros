<?php

namespace Database\Factories;

use App\Models\PolizaSalud;
use App\Models\HistorialMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

class PolizaSaludFactory extends Factory
{
    protected $model = PolizaSalud::class;

    public function definition(): array
    {
        $tiposSeguros = ['Salud', 'Oncológico', 'EPS', 'Dental', 'Visión'];
        $estados = ['activo', 'vencido', 'cancelado'];
        $fechaContratacion = $this->faker->dateTimeBetween('-3 years', '-1 month');
        $fechaVencimiento = $this->faker->dateTimeBetween('+1 month', '+2 years');
        
        return [
            'historial_medico_id' => HistorialMedico::factory(),
            'numero_poliza' => $this->faker->bothify('POL-####-????'),
            'tipo_seguro' => $this->faker->randomElement($tiposSeguros),
            'estado' => $this->faker->randomElement($estados),
            'fecha_contratacion' => $fechaContratacion,
            'fecha_vencimiento' => $fechaVencimiento,
            'prima_anual' => $this->faker->randomFloat(2, 500, 5000),
        ];
    }
}