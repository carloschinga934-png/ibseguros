<?php

namespace Database\Factories;

use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificacionFactory extends Factory
{
    protected $model = Notificacion::class;

    public function definition(): array
    {
        $tipos = ['reclamacion', 'renovacion', 'mensaje', 'alerta'];
        $estados = ['no_leida', 'leida', 'archivada'];
        $prioridades = ['baja', 'normal', 'alta', 'urgente'];
        
        return [
            'user_id' => User::factory(),
            'tipo' => $this->faker->randomElement($tipos),
            'titulo' => $this->faker->sentence(4),
            'contenido' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement($estados),
            'prioridad' => $this->faker->randomElement($prioridades),
            'numero_referencia' => $this->faker->bothify('POL-####-????'),
            'fecha_notificacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}