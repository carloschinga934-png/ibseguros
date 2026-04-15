<?php

namespace Database\Factories;

use App\Models\AtencionMedica;
use App\Models\PolizaSalud;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtencionMedicaFactory extends Factory
{
    protected $model = AtencionMedica::class;

    public function definition(): array
    {
        $tipos = ['Consulta', 'Emergencia', 'Hospitalización', 'Cirugía', 'Tratamiento', 'Examen'];
        $centrosMedicos = [
            'Clínica Internacional', 'Clínica Ricardo Palma', 'Clínica San Pablo',
            'Hospital Rebagliati', 'Clínica Good Hope', 'Clínica San Borja',
            'Hospital Almenara', 'Clínica Javier Prado', 'Clínica Delgado'
        ];
        $diagnosticos = [
            'Hipertensión arterial', 'Diabetes mellitus', 'Infección respiratoria',
            'Gastroenteritis', 'Migraña', 'Lumbalgia', 'Faringitis', 'Dermatitis',
            'Control preventivo', 'Fractura', 'Apendicitis'
        ];
        
        return [
            'poliza_id' => PolizaSalud::factory(),
            'fecha' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'tipo' => $this->faker->randomElement($tipos),
            'centro_medico' => $this->faker->randomElement($centrosMedicos),
            'diagnostico' => $this->faker->randomElement($diagnosticos),
            'monto' => $this->faker->randomFloat(2, 50, 5000),
        ];
    }
}