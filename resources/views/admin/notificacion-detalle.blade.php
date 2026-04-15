<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Detalle de Notificación - IB Seguros</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style>
      /* Estilos para aislar el header y evitar conflictos con Tailwind */
      .header-container {
        position: relative;
        z-index: 1000;
        width: 100%;
      }
      .header-container * {
        box-sizing: border-box;
      }
      .header-container .menu {
        height: 70px;
      }
      /* Ajuste para el contenido principal */
      .admin-content {
        padding-top: 20px;
      }
    </style>
  </head>
  <body>
    <!-- Contenedor para aislar el header -->
    <div class="header-container">
      @include('shared.partials.header')
    </div>
    
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root admin-content" style='font-family: "Public Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">

        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <p class="text-[#111518] tracking-light text-[32px] font-bold leading-tight min-w-72">Detalle de Notificación</p>
              <a href="{{ route('admin.notificaciones.index') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Volver a notificaciones</span>
              </a>
            </div>
            
            <!-- Detalle de la notificación -->
            <div class="bg-white rounded-xl border border-[#dbe1e6] p-6 mb-6">
              <h2 class="text-[#111518] text-[22px] font-bold leading-tight mb-4">{{ $notificacion->titulo }}</h2>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                  <p class="text-[#60768a] text-sm mb-1">Tipo de notificación</p>
                  <p class="text-[#111518] font-medium">
                    @if($notificacion->tipo == 'reclamacion')
                      Reclamación
                    @elseif($notificacion->tipo == 'renovacion')
                      Renovación
                    @elseif($notificacion->tipo == 'mensaje')
                      Mensaje
                    @else
                      {{ ucfirst($notificacion->tipo) }}
                    @endif
                  </p>
                </div>
                
                <div>
                  <p class="text-[#60768a] text-sm mb-1">Número de referencia</p>
                  <p class="text-[#111518] font-medium">#{{ $notificacion->numero_referencia }}</p>
                </div>
                
                <div>
                  <p class="text-[#60768a] text-sm mb-1">Fecha</p>
                  <p class="text-[#111518] font-medium">{{ $notificacion->fecha_notificacion->format('d/m/Y H:i') }}</p>
                </div>
                
                <div>
                  <p class="text-[#60768a] text-sm mb-1">Estado</p>
                  <p class="text-[#111518] font-medium">
                    @if($notificacion->estado == 'no_leida')
                      <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">No leída</span>
                    @elseif($notificacion->estado == 'leida')
                      <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Leída</span>
                    @elseif($notificacion->estado == 'archivada')
                      <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Archivada</span>
                    @endif
                  </p>
                </div>
                
                <div>
                  <p class="text-[#60768a] text-sm mb-1">Prioridad</p>
                  <p class="text-[#111518] font-medium">
                    @if($notificacion->prioridad == 'baja')
                      <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Baja</span>
                    @elseif($notificacion->prioridad == 'normal')
                      <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Normal</span>
                    @elseif($notificacion->prioridad == 'alta')
                      <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Alta</span>
                    @elseif($notificacion->prioridad == 'urgente')
                      <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Urgente</span>
                    @endif
                  </p>
                </div>
              </div>
              
              <div class="mb-6">
                <p class="text-[#60768a] text-sm mb-1">Contenido</p>
                <div class="p-4 bg-gray-50 rounded-lg">
                  <p class="text-[#111518] whitespace-pre-line">{{ $notificacion->contenido }}</p>
                </div>
              </div>
              
              <div class="flex justify-end gap-3">
                <a href="{{ route('admin.notificaciones.index') }}" class="px-4 py-2 bg-[#f0f2f5] text-[#111518] rounded-full font-medium">Volver</a>
                @if($notificacion->estado != 'archivada')
                <button class="px-4 py-2 bg-[#0b80ee] text-white rounded-full font-medium">Archivar notificación</button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/menuresponsive.js') }}"></script>
  </body>
</html>