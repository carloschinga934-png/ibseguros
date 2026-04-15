<?php
namespace App\Http\Controllers;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Dotenv\Dotenv;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{
    public function enviarCorreoPersona(Request $request)
    {
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();
        Log::info('Entró al método enviarCorreoPersona');
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:500|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+([ ]+[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$/',
                'email' => 'required|email',
                'celular' => 'required|string|min:9|max:9|regex:/^9[0-9]{8}$/',
                'dni' => 'required|string|max:8|regex:/^[0-9]{8}$/',
                'tipoSeguro' => 'required|string|max:255',
                'mensaje' => [
                    'required',
                    'string',
                    'min:10',
                    'max:300',
                    'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ]/',
                ],
            ]);

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = env('MAIL_PORT');
            $mail->CharSet = 'UTF-8';  // 👈 Esto fuerza a usar UTF-8
            $mail->Encoding = 'base64'; // 👈 Recomendado para tildes y ñ

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress(env('MAIL_TO_ADDRESS'));
            // $mail->addAddress('rogercancha@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Consulta Seguro Personal -' . $request->input('nombre');
            $mail->Body = '
<html>
<head>
    <title>Confirmación de Solicitud - IBSeguros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #0052cc;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px 20px;
        }
        .footer {
            background-color: #f0f0f0;
            text-align: center;
            font-size: 12px;
            color: #888;
            padding: 15px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #0052cc;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .highlight {
            color: #0052cc;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>IBSeguros</h1>
        </div>
        <div class="content">
            <h2>Nuevo contacto recibido desde IBSEGUROS</h2>
            <p>Fecha y hora de la solicitud: ' . date("Y-m-d H:i:s") . '</p>
            <p><strong>Datos recibidos:</strong></p>
            <ul>
                <li>Tipo de seguro: ' . $request->input('tipoSeguro') . '</li>
                <li>Celular: ' . $request->input('celular') . '</li>
                <li>Teléfono: ' . $request->input('telefono') . '</li>
                <li>Email: ' . $request->input('email') . '</li>
                <li>Mensaje: ' . $request->input('mensaje') . '</li>
            </ul>
            <a class="btn" href="https://ibseguros.com">Visita nuestro sitio</a>
        </div>
        <div class="footer">
        IBSeguros. Todos los derechos reservados.<br>
            Av. Circunvalación Golf Los Incas Nro. 208, Torre 3, Oficina 602B, Perú
            <br>
            Móvil:
            (+51) 912 027 724
            <br>
            Email: contacto@ibseguros.com
        </div>
    </div>
</body>
</html>
            ';
            $mail->send();

            $mail->clearAddresses();
            $mail->addAddress($request->input('email'));

            $mail->Subject = 'Confirmación de recepción de tu consulta';
            $mail->Body = '
<html>
<head>
<title>Confirmación de Correo</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f8fb;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }
    .card {
    background-color: white;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 400px;
    }
    .card h1 {
        color: #1a73e8;
        font-size: 24px;
        margin-bottom: 15px;
    }
    .card p {
        color: #444;
        font-size: 16px;
        margin: 10px 0;
    }
    .card .logo {
        width: 60px;
        margin-bottom: 20px;
    }
    .checkmark {
        font-size: 40px;
        color: green;
        margin-bottom: 15px;
    }
    .container{
        max-width: 600px;
        margin: auto;
        background-color: #ffffff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>
</head>
<body>
<div class="container">
<div class="card">
    <div class="checkmark">✔️</div>
    <h2>¡Muchas gracias, hemos recibido su consulta, ' . $request->input('nombre') . ' !</h2>
    <p>
        Se ha recibido una solicitud de contacto. Nuestro equipo revisará la información proporcionada y
se pondrá en contacto contigo en breve para ofrecerte una solución personalizada.
    </p>
    <p>
    Si tienes alguna pregunta o necesitas más información, no dudes en responder a este correo o
    llamarnos.
    </p>
    <a href="mailto:contacto@ibseguros.com" class=btn">Contactar con nosotros</a>
    <p>Gracias por contactar a <strong>IBSeguros</strong>.</p>
    <p>
        <a href="https://ibseguros.com">https://ibseguros.com</a><br>
        <a href="www.corporacionibgroup.pe">www.corporacionibgroup.pe </a>
    </p>
    <p>Nos comunicaremos contigo de inmediato.</p>
    </div>
</div>
</body>
</html>
';
            $mail->send();

            DB::table('contacto_persona')->insert([
                'dni' => $request->input('dni'),
                'nombre' => $request->input('nombre'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'celular' => $request->input('celular'),
                'tipoSeguro' => $request->input('tipoSeguro'),
                'mensaje' => $request->input('mensaje'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return response()->json(["status" => "success", "message" => "Mensaje enviado con éxito."], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error("Validación fallida: " . json_encode($e->errors()));
            return response()->json(["status" => "error", "errors" => $e->errors()]);
        } catch (PHPMailerException $e) {
            Log::error("ERROR en PHPMailer:" . $e->getMessage());
            return response()->json(["status" => "error", "message" => "Ocurrió un error al enviar el correo." . $e->getMessage()], 500);
        } catch (\Exception $e) {
            Log::error("Error general:" . $e->getMessage());
            return response()->json(["status" => "error", "message" => "Ocurrió un error inesperado."], 500);
        }
    }


    public function enviarCorreoEmpresa(Request $request)
    {
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();
        Log::info('Datos recibidos: ', $request->all());
        try {
            $validatedData = $request->validate([
                'nombre_apellido_empresa' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+([ ]+[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$/',
                'nombreempresa' => 'required|string|max:255',
                'RUCempresa' => 'required|string|max:11|regex:/^[0-9]{11}$/',
                'rubroempresa' => 'required|string|max:255',
                'emailempresa' => 'required|email|max:255',
                'telefonofijoempresa' => '|string|max:20|regex:/^\d{9,20}$/',
                'tipoSeguroEmpresa' => 'required|string|max:255',
                'telefonoempresa' => 'required|string|max:20',
                'mensajeempresa' => 'required|string|min:10|max:1000|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ]/',
            ]);
            $fecha = '<strong>Fecha:</strong> ' . (new \DateTime())->format('d/m/Y H:i:s') . "<br>";
            $contenidoCorreoEmpresa = $fecha . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Nombre y Apellido: </strong>' . $request->input('nombre_apellido_empresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Nombre de la Empresa: </strong>' . $request->input('nombreempresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>RUC de la Empresa: </strong>' . $request->input('RUCempresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Rubro de la Empresa: </strong>' . $request->input('rubroempresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Email de la Empresa: </strong>' . $request->input('emailempresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Teléfono Fijo de la Empresa: </strong>' . $request->input('telefonofijoempresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Tipo de Seguro: </strong>' . $request->input('tipoSeguroEmpresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Teléfono de la Empresa: </strong>' . $request->input('telefonoempresa') . "<br>";
            $contenidoCorreoEmpresa .= '<strong>Mensaje: </strong>' . $request->input('mensajeempresa') . "<br>";

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress(env('MAIL_TO_ADDRESS'));

            $mail->isHTML(true);
            $mail->Subject = 'Consulta de Seguro Empresarial - ' . $request->input('nombreempresa');
            $mail->Body = '
            <html>
<head>
    <title>Confirmación de Solicitud - IBSeguros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #0052cc;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px 20px;
        }
        .footer {
            background-color: #f0f0f0;
            text-align: center;
            font-size: 12px;
            color: #888;
            padding: 15px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #0052cc;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .highlight {
            color: #0052cc;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>IBSeguros</h1>
        </div>
        <div class="content">
            <h2>¡Gracias por tu solicitud!</h2>
            <p>Hola ' . $request->input('nombrespersona') . ' </p>
            <p>De ' . $request->input('nombreempresa') . ', hemos recibido correctamente tu solicitud de seguro empresarial. Nuestro equipo la está revisando y nos pondremos en contacto contigo en breve para continuar con el proceso.</p>
            <p><strong>Datos recibidos:</strong></p>
            <ul>
                <li>Tipo de seguro: ' . $request->input('tiposeguro') . '</li>
                <li>Teléfono: ' . $request->input('telefonopersona') . '</li>
                <li>Email: ' . $request->input('emailpersona') . '</li>
                <li>Mensaje: ' . $request->input('mensaje') . '</li>
            </ul>

            <a class="btn">Visita nuestro sitio</a>
        </div>
        <div class="footer">
        IBSeguros. Todos los derechos reservados.<br>
            Av. Circunvalación Golf Los Incas Nro. 208, Torre 3, Oficina 602B, Perú
            <br>
            Móvil:
            (+51) 912 027 724
            <br>
            Email:contacto@ibseguros.com
        </div>
    </div>
</body>
</html>
            ';
            $mail->send();

            $mail->clearAddresses();
            $mail->addAddress($request->input('emailempresa'));

            $mail->Subject = 'Confirmación de recepción de tu consulta';
            $mail->Body = '
            <html>
<head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f8fb;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }

    .card {
    background-color: white;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 400px;
    }

    .card h1 {
    color: #1a73e8;
    font-size: 24px;
    margin-bottom: 15px;
    }

    .card p {
    color: #444;
    font-size: 16px;
    margin: 10px 0;
    }

    .card .logo {
    width: 60px;
    margin-bottom: 20px;
    }

    .checkmark {
    font-size: 40px;
    color: green;
    margin-bottom: 15px;
    }
</style>
</head>
<body>
<div class="card">
    <div class="checkmark">✔️</div>
    <h2>¡Muchas gracias, hemos recibido su consulta, ' . $request->input('nombrespersona') . ' !</h2>
    <p>
        Hemos recibido tu solicitud de contacto. Nuestro equipo revisará la información proporcionada y
    se pondrá en contacto contigo en breve para ofrecerte una solución personalizada.
    </p>
    <p>
    Si tienes alguna pregunta o necesitas más información, no dudes en responder a este correo o
    llamarnos.
    </p>
    <a href="mailto:contacto@ibseguros.com" class=btn">Contactar con nosotros</a>

    <p>Gracias por contactar a <strong>IBSeguros</strong>.</p>
    <p>
        <a href="www.iboutplacement.com">www.iboutplacement.com </a><br
        <a href="www.corporacionibgroup.pe">www.corporacionibgroup.pe </a>
    </p>
    <p>Nos comunicaremos contigo de inmediato.</p>
</div>
</body>
</html>

            ';
            $mail->send();
            return response()->json(["status" => "success", "message" => "Mensaje enviado con éxito."], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {

            Log::error("Validación fallida: " . json_encode($e->errors())); //Registro de los errores en el log
            return response()->json(["status" => "error", "errors" => $e->errors()]);

        } catch (PHPMailerException $e) {

            Log::error("ERROR en PHPMailer: " . $e->getMessage());
            return response()->json(["status" => "error", "message" => "Ocurrió un error al enviar el correo."], 500);

        } catch (\Exception $e) {

            Log::error("Error general: " . $e->getMessage());
            return response()->json(["status" => "error", "message" => "Ocurrió un error inesperado."], 500);
        }
    }
}