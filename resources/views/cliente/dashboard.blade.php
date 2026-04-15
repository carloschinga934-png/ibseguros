<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Panel de Cliente</title>
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
      .cliente-content {
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
    
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root cliente-content" style='font-family: "Public Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">

        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <p class="text-[#111518] tracking-light text-[32px] font-bold leading-tight min-w-72">Panel de Cliente: {{ $user->name }}</p>
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]">
                    <span class="truncate">Cerrar sesión</span>
                  </button>
              </form>
            </div>
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Mis Pólizas</h2>
            <div class="flex flex-wrap gap-4 p-4">
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Pólizas Activas</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">{{ $polizasActivas }}</p>
              </div>
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Próximas a Vencer</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">{{ $polizasProximasVencer }}</p>
              </div>
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Reclamaciones</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">{{ $reclamaciones }}</p>
              </div>
            </div>
            <!-- Listado de pólizas -->
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Mis Seguros</h2>
            
            <div class="flex justify-between items-center px-4 mb-2">
              <div></div>
              <a href="{{ route('cliente.polizas.index') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Ver más</span>
              </a>
            </div>
            
            @if($polizas->count() > 0)
              @foreach($polizas as $poliza)
                <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between border-b border-[#dbe1e6]">
                  <div class="flex flex-col justify-center">
                    <p class="text-[#111518] text-base font-medium leading-normal line-clamp-1">{{ $poliza->tipo_seguro }}</p>
                    <p class="text-[#60768a] text-sm font-normal leading-normal line-clamp-2">Póliza #{{ $poliza->numero_poliza }} - Vence: {{ $poliza->fecha_vencimiento->format('d/m/Y') }}</p>
                  </div>
                  <div class="shrink-0"><a href="{{ route('cliente.polizas.show', ['id' => $poliza->id]) }}" class="text-base font-medium leading-normal text-[#0b80ee]">Ver detalles</a></div>
                </div>
              @endforeach
            @else
              <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between border-b border-[#dbe1e6]">
                <div class="flex flex-col justify-center">
                  <p class="text-[#111518] text-base font-medium leading-normal">No tienes pólizas activas</p>
                </div>
              </div>
            @endif
            
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Acciones rápidas</h2>
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-start">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#0b80ee] text-white text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Solicitar nuevo seguro</span>
                </button>
                <button
                  onclick="openModal('contactar-asesor-modal')"
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Contactar asesor</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para contactar asesor -->
    <div id="contactar-asesor-modal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Contactar a un asesor</h3>
          <span class="close-modal" onclick="closeModal('contactar-asesor-modal')">&times;</span>
        </div>
        <div class="modal-body">
          <form id="contactar-form" action="{{ route('cliente.contactar-asesor') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="titulo" class="block text-[#60768a] text-sm mb-1">Asunto</label>
              <input type="text" id="titulo" name="titulo" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md" required>
            </div>
            <div class="mb-4">
              <label for="prioridad" class="block text-[#60768a] text-sm mb-1">Prioridad</label>
              <select id="prioridad" name="prioridad" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md" required>
                <option value="baja">Baja</option>
                <option value="normal" selected>Normal</option>
                <option value="alta">Alta</option>
                <option value="urgente">Urgente</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="contenido" class="block text-[#60768a] text-sm mb-1">Mensaje</label>
              <textarea id="contenido" name="contenido" rows="5" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md" required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="modal-btn modal-btn-secondary" onclick="closeModal('contactar-asesor-modal')">Cancelar</button>
          <button class="modal-btn modal-btn-primary" onclick="document.getElementById('contactar-form').submit()">Enviar mensaje</button>
        </div>
      </div>
    </div>

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