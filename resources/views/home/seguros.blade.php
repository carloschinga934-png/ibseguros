<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/seguros/seguros.css') }}">
</head>

<body>
   <!-- ================== Carousel ================== -->
   <div class="carouselFondo2">
      <div class="overlay2">
         <h2>SEGUROS</h2>
         <p>{{ __('strings.intro_seguros') }}</p>
         <div class="text-center">
            <button class="enlace-leer btn btn-primary btn-lg px-5 py-3 fs-4"
               onclick="mostrarFormularioSalud()">Solicitar Seguro</button>
         </div>
      </div>
   </div>

   <!-- ================== Buscador ================== -->
   <div class="container my-4">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="input-group mb-3">
               <input type="text" id="input-busqueda" class="form-control" placeholder="Buscar..."
                  aria-label="Buscar...">
               <button class="btn btn-primary" type="button" id="boton-busqueda"><i class="bi bi-search"></i></button>
            </div>
         </div>
      </div>
      <div class="text-center my-3" id="spinner" style="display:none;">
         <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div>
         <p class="mt-2">Cargando...</p>
      </div>
   </div>

   <!-- ================== Cards principales ================== -->
   <div class="container-fluid" id="cards-principales">
      <div class="row justify-content-center">
         <div class="col-md-9">
            @foreach ($listaSeguros as $index => $seguro)
               <x-card-seguro :image="$seguro['image']" :title="$seguro['title']" :items="$seguro['items']"
                  :link="$seguro['link'] ?? '#'" />
               @if ($index == 17)
                  @break
               @endif
            @endforeach
         </div>
      </div>
   </div>

   <!-- ================== Contenido adicional ================== -->
   <div id="contenido-adicional" style="display: none;">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-md-9">
               @foreach ($listaSeguros as $index => $seguro)
                  @if($index >= 18)
                     <x-card-seguro class="info-div" :image="$seguro['image']" :title="$seguro['title']"
                        :items="$seguro['items']" :link="$seguro['link'] ?? '#'" />
                  @endif
               @endforeach
            </div>
         </div>
      </div>
   </div>

   <!-- Botón Ver más -->
   <div class="ver-mas-container" id="ver-mas-container">
      <button id="ver-mas-btn">Ver más</button>
   </div>

   <!-- Texto centrado -->
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6 text-center mt-4">
            <p class="texto-centrado">¡Tu seguridad es nuestra prioridad número uno!</p>
         </div>
      </div>
   </div>

   <!-- Modal formulario -->
   <div id="formularioSaludModal" class="modal">
      <div class="modal-content">
         <span class="close" onclick="cerrarFormulario()">&times;</span>
         @include('seguros.seguro-solicitud')
      </div>
   </div>

   <!-- Botón subir -->
   <button id="btnSubir"><i class="bi bi-arrow-up"></i></button>

   <script src="{{ asset('js/seguros/seguros.js') }}"></script>
</body>