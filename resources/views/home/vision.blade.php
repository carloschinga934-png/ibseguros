<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/nosotros/nosotros.css') }}">
      <link rel="stylesheet" href="{{ asset('css/contacto/formulario-contacto.css') }}">
   <Title>Vision</Title>
</head>

<body>
   <div class="carouselFondo2">
      <div class="overlay2">
         <div class="p-5">
            <h2>Acerca de Nosotros</h2>
            <p>¡En IBSEGUROS, nos enorgullece ser una fuente confiable de seguridad y tranquilidad para nuestros
               clientes!</p>
         </div>
         <div class="contenedor">
            <a class="enlace2 mision" href="nosotros" style="margin-left:93%">
               <h4>MISIÓN</h4>
            </a>
            <a class="enlace2 vision" href="vision" style="margin-left:17px">
               <h4>VISIÓN </h4>
            </a>
            <a class="enlace2 valores" href="valores" style="margin-right:100%">
               <h4>VALORES</h4>
            </a>
         </div>
      </div>
   </div>

   <section id="nosotros">
      <div class="container">
         <h2 class="mt-4" style="text-align: left; font-family: sans-serif; 
font-size: 57px;  padding: 18px;color:black ;margin-bottom: 50px; margin-bottom:15px">VISIÓN</h2>

         <h1 class="mt-4 a" style="text-align: justify; font-family: sans-serif; 
font-size: 19px;  padding: 18px 97px;color:#00000094 ;margin-bottom: 50px;">Ser la empresa de seguros más reconocida y
            confiable por su compromiso con la excelencia, la innovación
            y la satisfacción de sus clientes, brindándoles la mejor experiencia posible en la gestión de sus riesgos y
            la protección de su patrimonio.
         </h1>
      </div>
      <section class="contact_section layout_padding-bottom mt-5">
         <div class="container-fluid">
            <div class="layout_padding-top layout_padding2-bottom">
               <div class="row">
                  <div class="col-md-5 order-md-1 d-flex align-items-center justify-content-center">
                     <div class="text-center" style="width:100%">
                        <img src="images/man2.webp" alt="Descripción de la imagen" class="img-fluid"
                           style="margin-left:47%;  max-width: 80%; margin-top:-65px">
                     </div>
                  </div>
                  <div class="col-md-4 order-md-2 custom-padding" style="margin-left: -125px; color: black; border-radius: 10px; 
                background-color: #283b85;padding: 36px 43px; height:auto; margin-top:26%; margin-left:6%">
                     <h1 style="font-size: 19px; color: white; padding: 5px; font-weight:100">TU tranquilidad es nuestro
                        prioridad número uno. Confía en <strong style="font-weight: bold;">IBSEGUROS</strong>para
                        proteger lo que
                        más valoras. <strong style="font-weight: bold;">¡Descubre por qué miles de clientes confían en
                           nosotros y contáctanos</strong> hoy mismo para obtener más información o para
                        solicitar una cotización gratuita!</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <div class="container mb-5 mt-5">
         <div class="contact-form-panel">
            <x-contacto-formulario />

            <!-- Imagen decorativa -->
            <div class="form-image">
               <img src="images/personaje.webp" alt="Decoración">
            </div>
         </div>
      </div>

</body>