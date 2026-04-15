<?php

namespace Database\Factories;

use App\Models\HistorialMedico;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialMedicoFactory extends Factory
{
    protected $model = HistorialMedico::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
        ];
    }
}