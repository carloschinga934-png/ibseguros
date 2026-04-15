<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CorreoController extends Controller
{
   public function enviarCorreo(Request $request)
   {
      $request->validate([
         'emailpersona' => 'required|email',
         'nombrespersona' => 'required|string|max:255',
      ]);

      $mail = new PHPMailer(true);

      try {
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = env('MAIL_USERNAME');
         $mail->Password = env('MAIL_PASSWORD');
         $mail->SMTPSecure = 'tls';
         $mail->Port = 587;

         $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

         $mail->addAddress($request->emailpersona, $request->nombrespersona);
         $mail->addAddress(env('MAIL_USERNAME'), 'Administrador IBSEGUROS');

         $mail->isHTML(true);
         $mail->Subject = 'Gracias por contactarnos - IBSEGUROS';
         $mail->Body    = "
                <h3>Hola {$request->nombrespersona},</h3>
                <p>Gracias por contactarnos. Hemos recibido tu mensaje correctamente.</p>
                <p>Veremos el problema o duda que tienes y te responderemos a la brevedad.</p>
                <br>
                <p>Atentamente,</p>
                <p><strong>IBSEGUROS</strong></p>
            ";

         $mail->send();
         return back()->with('success', 'Mensaje enviado correctamente. Revisa tu correo.');
      } catch (Exception $e) {
         return back()->with('error', 'Error al enviar el correo: ' . $mail->ErrorInfo);
      }
   }
}
