<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/nosotros/nosotros.css') }}">
   <link rel="stylesheet" href="{{ asset('css/contacto/formulario-contacto.css') }}">
   <Title>Nosotros</Title>
   
   <!-- CSS de corrección para la imagen -->
   <style>
    
      /* Reorganización del layout para evitar superposición de texto */
      .contact_section .row {
         display: flex;
         flex-wrap: wrap;
         align-items: stretch;
         margin: 0;
      }

      /* Contenedor de la imagen - lado izquierdo */
      .col-md-5.order-md-1 {
         display: flex !important;
         align-items: center !important;
         justify-content: center !important;
         padding: 30px 15px !important;
         background: linear-gradient(135deg, #f8f9ff 0%, #e8f0ff 100%);
         border-radius: 15px 0 0 15px;
         margin: 0 !important;
      }

      .col-md-5.order-md-1 .text-center {
         width: 100% !important;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 0;
      }

      .col-md-5.order-md-1 .text-center img {
         margin: 0 !important;
         max-width: 90% !important;
         width: auto !important;
         height: auto !important;
         max-height: 350px !important;
         object-fit: contain !important;
         border-radius: 12px;
         box-shadow: 0 8px 25px rgba(40, 59, 133, 0.15);
         display: block;
      }

      /* Contenedor del texto - lado derecho */
      .col-md-4.order-md-2.custom-padding {
         margin: 0 !important;
         margin-left: 0 !important;
         margin-top: 0 !important;
         padding: 40px 35px !important;
         background-color: #283b85 !important;
         border-radius: 0 15px 15px 0 !important;
         display: flex;
         align-items: center;
         min-height: 300px;
         position: relative;
         z-index: 2;
      }

      /* Mejorar legibilidad del texto */
      .col-md-4.order-md-2.custom-padding h1 {
         font-size: 18px !important;
         color: white !important;
         padding: 0 !important;
         font-weight: 300 !important;
         line-height: 1.6 !important;
         text-align: left !important;
         margin: 0 !important;
      }

      .col-md-4.order-md-2.custom-padding h1 strong {
         font-weight: 700 !important;
         color: #4a90e2 !important;
      }

      /* Responsive - móviles */
      @media (max-width: 768px) {
         .contact_section .row {
            flex-direction: column;
         }
         
         .col-md-5.order-md-1,
         .col-md-4.order-md-2.custom-padding {
            border-radius: 15px !important;
            margin-bottom: 20px !important;
         }
         
         .col-md-5.order-md-1 {
            order: 1;
         }
         
         .col-md-4.order-md-2.custom-padding {
            order: 2;
            min-height: auto;
            padding: 25px !important;
         }
         
         .col-md-5.order-md-1 .text-center img {
            max-width: 95% !important;
            max-height: 280px !important;
         }
      }
   </style>
</head>

<body>
   <div class="carouselFondo2">
      <div class="overlay2">
         <div class="p-5">
            <h2>{{ __('strings.nosotros') }}</h2>
            <p>{{ __('strings.nosotros_intro') }}</p>
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
      <div class="container ">
         <h2 class="mt-4" style="text-align: left; font-family: sans-serif; 
font-size: 57px;  padding: 18px;color:black ;margin-bottom: 50px; margin-bottom:15px">
            MISIÓN</h2>
         <h1 class="mt-4 a" style="text-align: justify; font-family: sans-serif; 
font-size: 19px;  padding: 18px 97px;color:#00000094 ;margin-bottom: 50px;">
            Ser la fuente de seguridad y tranquilidad líder en el mercado, ofreciendo soluciones de seguros
            confiables
            y servicios financieros de calidad que protegen lo que más valoran nuestros clientes, acompañándolos en
            cada etapa de su vida.
         </h1>
      </div>
      <section class="contact_section layout_padding-bottom mt-5">
         <div class="container-fluid">
            <div class="layout_padding-top layout_padding2-bottom">
               <div class="row">
                  <div class="col-md-5 order-md-1 d-flex align-items-center justify-content-center">
                     <div class="text-center">
                        <img src="images/labour-day.webp" alt="Descripción de la imagen" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-md-4 order-md-2 custom-padding" style="margin-left: -125px; color: black; border-radius: 10px; 
               background-color: #283b85;padding: 36px 43px; height:auto; margin-top:26%; margin-left:10%">
                     <h1 style="font-size: 18px; color: white; padding: 5px; font-weight:100">En <strong
                           style="font-weight: bold;">IBSEGUROS</strong>, contamos con un equipo de expertos en
                        seguros dedicados a brindarte un asesoramiento personalizado
                        y soluciones adaptadas a tus necesidades. <strong style="font-weight: bold;">Nuestra
                           amplia gama de seguros incluye coberturas para vida, salud, vehículo, hogar,
                           responsabilidad civil</strong>, y
                        mucho más.</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
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