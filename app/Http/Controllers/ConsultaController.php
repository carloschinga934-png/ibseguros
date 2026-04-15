<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ConsultaController extends Controller
{
   public function enviarConsulta(Request $request)
   {
      // Validar los datos del formulario
      $validatedData = $request->validate([
         'tipo' => 'required|string|max:255',
         'nombre' => 'required|string|max:255',
         'apellido' => 'required|string|max:255',
         'email' => 'required|email|max:255',
         'telefono' => 'nullable|string|max:20',
         'mensaje' => 'required|string|max:1000',
      ]);
      $DatosEnvio = [
         'tipo' => $validatedData['tipo'],
         'nombre' => $validatedData['nombre'],
         'apellido' => $validatedData['apellido'],
         'email' => $validatedData['email'],
         'telefono' => $validatedData['telefono'] ?? null, // Puede ser nulo
         'mensaje' => $validatedData['mensaje'],
      ];

      Log::info('Datos de la consulta:', $validatedData);
      // Enviar el correo
      try {
         Mail::to($validatedData['email'])->send(new ContactanosMailable($validatedData));
         //Envío de correo con éxito 
         return redirect()->back()->with('message', 'Consulta enviada correctamente.');
      } catch (\Exception $e) {
         Log::error('Error al enviar el correo: ' . $e->getMessage());
         //Respuest si el correo no se envió 
         return redirect()->back()->with('error', 'Hubo un problema al enviar la consulta. Por favor, inténtelo de nuevo más tarde.');
      }
   }
}
