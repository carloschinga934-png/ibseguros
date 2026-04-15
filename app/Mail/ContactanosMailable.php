<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactanosMailable extends Mailable
{
   use Queueable, SerializesModels;

   public $data; // Asegúrate de que esta propiedad esté definida

   public function __construct($data)
   {
      $this->data = $data;
   }

   public function build()
   {
      // Generar el asunto dinámicamente con nombre, apellido 
      $asunto = "IBSeguros: " . ($this->data['nombre'] ?? '') . " " . ($this->data['apellido'] ?? '') .
         " - " . ($this->data['email'] ?? '');

      return $this->subject($asunto)  // Asunto personalizado
         ->view('emails.contactanos')  // Vista del correo (debes crearla si no existe)
         ->with(['data' => $this->data]); // 👈 Asegura que se pase a la vista
   }
}
