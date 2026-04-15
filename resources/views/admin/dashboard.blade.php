<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Panel de Administración</title>
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
      /* Estilos para el modal */
      .modal {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
      }
      .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #dbe1e6;
        border-radius: 12px;
        width: 80%;
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }
      .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #dbe1e6;
        padding-bottom: 10px;
        margin-bottom: 15px;
      }
      .modal-title {
        font-weight: 700;
        font-size: 18px;
        color: #111518;
      }
      .close-modal {
        color: #60768a;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
      }
      .close-modal:hover {
        color: #111518;
      }
      .modal-body {
        margin-bottom: 15px;
      }
      .modal-footer {
        display: flex;
        justify-content: flex-end;
        border-top: 1px solid #dbe1e6;
        padding-top: 15px;
      }
      .modal-btn {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        cursor: pointer;
      }
      .modal-btn-primary {
        background-color: #0b80ee;
        color: white;
        margin-left: 10px;
      }
      .modal-btn-secondary {
        background-color: #f0f2f5;
        color: #111518;
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
              <p class="text-[#111518] tracking-light text-[32px] font-bold leading-tight min-w-72">Panel de administración</p>
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit">Cerrar sesión</button>
              </form>
            </div>
            <!-- Resumen de actividades recientes -->
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Resumen de actividades recientes</h2>
            <div class="flex flex-wrap gap-4 p-4">
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Nuevas pólizas emitidas</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">{{ $nuevasPolizas }}</p>
              </div>
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Reclamaciones pendientes</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">{{ $reclamacionesPendientes }}</p>
              </div>
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Mensajes de clientes</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">{{ $mensajesClientes }}</p>
              </div>
            </div>
            <!-- Notificaciones -->
            <div class="flex justify-between items-center px-4 pb-3 pt-5">
              <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em]">Notificaciones</h2>
              <a href="{{ route('admin.notificaciones.index') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#e4e7ec] transition-colors">
                <span class="truncate">Ver más</span>
              </a>
            </div>
            @forelse($notificaciones as $notificacion)
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex flex-col justify-center">
                <p class="text-[#111518] text-base font-medium leading-normal line-clamp-1">{{ $notificacion->titulo }}</p>
                <p class="text-[#60768a] text-sm font-normal leading-normal line-clamp-2">{{ $notificacion->tipo == 'reclamacion' ? 'Reclamación' : ($notificacion->tipo == 'renovacion' ? 'Renovación' : 'Mensaje') }} #{{ $notificacion->numero_referencia }} - {{ Str::limit($notificacion->contenido, 50) }}</p>
              </div>
              <div class="shrink-0"><button class="text-base font-medium leading-normal" onclick="openModal('modal-{{ $notificacion->id }}')">Ver detalles</button></div>
            </div>
            @empty
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <p class="text-[#60768a] text-sm">No hay notificaciones disponibles</p>
            </div>
            @endforelse
            
            <!-- Sección de Historial Médico Digital -->
            <div class="flex justify-between items-center px-4 pb-3 pt-5">
              <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em]">Historial Médico Digital</h2>
              <a href="{{ route('admin.historial-medico.index') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#e4e7ec] transition-colors">
                <span class="truncate">Ver más</span>
              </a>
            </div>
            @forelse($historiales as $historial)
              @php
                $poliza = $historial->polizas->first();
              @endphp
              @if($historial->user && $poliza)
              <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between border-b border-[#dbe1e6]">
                <div class="flex flex-col justify-center">
                  <p class="text-[#111518] text-base font-medium leading-normal line-clamp-1">{{ $historial->user->name }}</p>
                  <p class="text-[#60768a] text-sm font-normal leading-normal line-clamp-2">{{ $poliza->tipo_seguro }} - Contratado: {{ $poliza->fecha_contratacion->format('d/m/Y') }} - Vence: {{ $poliza->fecha_vencimiento->format('d/m/Y') }}</p>
                </div>
                <div class="shrink-0"><a href="{{ route('admin.historial-medico', ['id' => $historial->id]) }}" class="text-base font-medium leading-normal text-[#0b80ee]">Ver más</a></div>
              </div>
              @endif
            @empty
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between border-b border-[#dbe1e6]">
              <p class="text-[#60768a] text-sm">No hay historiales médicos disponibles</p>
            </div>
            @endforelse
            
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Acciones rápidas</h2>
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-start">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#0b80ee] text-white text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Añadir nuevo cliente</span>
                </button>
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Crear nueva póliza</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modales dinámicos para las notificaciones -->
    @foreach($notificaciones as $notificacion)
    <div id="modal-{{ $notificacion->id }}" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">{{ $notificacion->titulo }}</h3>
          <span class="close-modal" onclick="closeModal('modal-{{ $notificacion->id }}')">&times;</span>
        </div>
        <div class="modal-body">
          <p><strong>Tipo:</strong> 
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
          <p><strong>Número de referencia:</strong> #{{ $notificacion->numero_referencia }}</p>
          <p><strong>Fecha:</strong> {{ $notificacion->fecha_notificacion->format('d/m/Y H:i') }}</p>
          <p><strong>Estado:</strong> 
            @if($notificacion->estado == 'no_leida')
              <span style="color: #ffc107; font-weight: bold;">No leída</span>
            @elseif($notificacion->estado == 'leida')
              <span style="color: #28a745; font-weight: bold;">Leída</span>
            @elseif($notificacion->estado == 'archivada')
              <span style="color: #17a2b8; font-weight: bold;">Archivada</span>
            @endif
          </p>
          <p><strong>Prioridad:</strong> 
            @if($notificacion->prioridad == 'baja')
              <span style="color: #17a2b8; font-weight: bold;">Baja</span>
            @elseif($notificacion->prioridad == 'normal')
              <span style="color: #28a745; font-weight: bold;">Normal</span>
            @elseif($notificacion->prioridad == 'alta')
              <span style="color: #ffc107; font-weight: bold;">Alta</span>
            @elseif($notificacion->prioridad == 'urgente')
              <span style="color: #dc3545; font-weight: bold;">Urgente</span>
            @endif
          </p>
          <p><strong>Contenido:</strong></p>
          <div style="background-color: #f8f9fa; padding: 10px; border-radius: 5px; margin-top: 5px;">
            <p style="white-space: pre-line;">{{ $notificacion->contenido }}</p>
          </div>
        </div>
        <div class="modal-footer">
          <button class="modal-btn modal-btn-secondary" onclick="closeModal('modal-{{ $notificacion->id }}')">Cerrar</button>
          <a href="{{ route('admin.notificaciones.ver', $notificacion->id) }}" class="modal-btn modal-btn-primary">Ver más</a>
        </div>
      </div>
    </div>
    @endforeach

    <script src="{{ asset('js/menuresponsive.js') }}"></script>
    <script>
      // Funciones para manejar los modales
      function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
      }
      
      function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
      }
      
      // Cerrar el modal si se hace clic fuera de él
      window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
          event.target.style.display = "none";
        }
      }
    </script>
  </body>
</html>
