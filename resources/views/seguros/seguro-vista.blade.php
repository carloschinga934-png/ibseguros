<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/seguros/seguro-detalle.css') }}">
   <link rel="stylesheet" href="{{ asset('css/contacto/formulario-contacto.css') }}">
</head>

<body>

   @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         {{ session('success') }}
      </div>
   @endif

   <x-solicitud-seguro :title="$seguroDetalle->title" :defaultTipo="null" />

   <x-seguro-detalle :banner="$seguroDetalle->banner" :title="$seguroDetalle->title"
      :description="$seguroDetalle->description" :offers="$seguroDetalle->offers" />

   <div class="container text-center ">
      <a href="#myModal" onclick="document.getElementById('myModal').style.display='block'">
         <button class="boton-seguros">¡Lo quiero!</button>
      </a>
   </div>

   <!-- Aqui va el Carrusel-->

   <x-carrusel-seguro :title="'¡Otras personas tambien buscaron!'" :isFeatures="true" :seguro="$seguro" />

   <div class="container mb-5">
      <div class="contact-form-panel">
         <x-contacto-formulario />

         <!-- Imagen decorativa -->
         <div class="form-image">
            <img src="/images/personaje.webp" alt="Decoración">
         </div>
      </div>
   </div>

   <script src="{{ asset('js/seguros/seguro-solicitud.js') }}"></script>
</body>