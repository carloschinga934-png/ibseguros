<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/agente/agente.css') }}">
</head>

<body>
   <div class="position-relative d-flex align-items-center justify-content-center carouselFondo">
      <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: #00388199;"></div>

      <div class="content text-center text-white position-relative mt-4">
         <h2 class="display-3 fw-bold">Agentes de Seguros</h2>
         <div class="mx-auto mt-4" style="width:120px; height:5px; background:#fff; border-radius:3px;"></div>
      </div>
   </div>

   <div class="container-fluid my-5">
      <div class="card shadow-lg border-0 overflow-hidden w-100 mx-auto" style="max-width:1600px;">
         <div class="row g-0 align-items-stretch">
            <div class="col-lg-6 text-white p-5 d-flex align-items-center"
               style="background: linear-gradient(135deg, #0d6efd, #0a58ca);">
               <div class="d-flex align-items-center">
                  <div class="me-3" style="font-size: 2rem; line-height: 1;">&#8594;</div>
                  <h3 class="mb-0 fw-bold" style="font-family: monospace;">Conoce acerca de nuestro trabajo</h3>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="ratio ratio-16x9">
                  <video controls>
                     <source src="images/IBSEGUROS.mp4" type="video/mp4">
                  </video>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid my-1">
      <div class="card shadow-lg border-0 overflow-hidden w-100 mx-auto" style="max-width:1600px;">
         <div class="row g-0 align-items-center align-items-stretch">
            <div class="col-lg-6">
               <img src="images/meeting.webp" alt="Imagen" class="w-100 h-100" style="object-fit: cover;">
            </div>
            <div class="col-lg-6 text-white p-5 d-flex flex-column justify-content-center" style="background:#0d6efd;">
               <h3 class="fs-1">IBSeguros</h3>
               <p class="fs-5" style="text-align: justify;">{{ __('strings.intro_agente') }}</p>
               <div class="d-flex align-items-center">
                  <span class="me-2">&#8594;</span>
                  <a href="{{ route('seguros') }}" class="text-white">Ver más</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <section class="agente-section">
      <!-- Card con efecto -->
      <div class="agente-card">
         <img src="images/teayudamos.webp" alt="Agente de servicios">
         <div>
            <h3>Su seguridad en buenas manos</h3>
            <p>{{ __('strings.trusteed_message_agente') }}</p>
         </div>
      </div>

      <!-- Título fuera de la card -->
      <h1>Nuestros Agentes de Servicios</h1>
   </section>

   <div class="carrusel">
      <div class="carrusel-track">
         @foreach ($carruselItems as $item)
            <x-carrusel-item :url="$item['url']" :imgSrc="$item['imgSrc']" :imgAlt="$item['imgAlt']" />
         @endforeach
      </div>
   </div>

   <script src="{{ asset('js/agente/agente.js') }}"></script>
</body>
