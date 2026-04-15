<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <title>Confirmación de Solicitud - IBSeguros</title>
   <style>
      body {
         font-family: 'Arial', sans-serif;
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
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
         <p>Hola {{ $data['nombre']}} </p>
         <p>Hemos recibido correctamente tu solicitud de seguro. Nuestro equipo la está revisando y nos pondremos en
            contacto contigo en breve para continuar con el proceso.</p>

         <p><strong>Datos recibidos:</strong></p>
         <ul>
            <li>Tipo de seguro: {{ $data['tipo'] }}</li>
            <li>Teléfono: {{ $data['telefono'] }}</li>
            <li>Email: {{ $data['email'] }}</li>
            <li>Mensaje: {{ $data['mensaje'] }}</li>
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