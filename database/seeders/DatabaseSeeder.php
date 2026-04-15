<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@ibseguros.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'tipo' => 'admin', // Añadir esta línea
            'dni' => '00000000', // Añadir un DNI válido
            'telefono' => '000000000', // Añadir un teléfono válido
        ]);
        
        // Ejecutar el seeder de datos médicos y notificaciones
        $this->call([
            MedicoNotificacionSeeder::class,
        ]);
    }
}