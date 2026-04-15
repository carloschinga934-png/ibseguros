<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notificaciones - IB Seguros</title>
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
      .badge {
        display: inline-block;
        padding: 0.25em 0.6em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
      }
      .badge-success {
        color: #fff;
        background-color: #28a745;
      }
      .badge-warning {
        color: #212529;
        background-color: #ffc107;
      }
      .badge-danger {
        color: #fff;
        background-color: #dc3545;
      }
      .badge-info {
        color: #fff;
        background-color: #17a2b8;
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
              <p class="text-[#111518] tracking-light text-[32px] font-bold leading-tight min-w-72">Notificaciones</p>
              <a href="{{ route('admin.dashboard') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Volver al panel</span>
              </a>
            </div>
            
            <!-- Filtros de búsqueda -->
            <div class="bg-white rounded-xl border border-[#dbe1e6] p-4 mb-6">
              <form action="{{ route('admin.notificaciones.index') }}" method="GET" class="flex flex-wrap gap-3">
                <div class="flex-1 min-w-[200px]">
                  <label for="tipo" class="block text-[#60768a] text-sm mb-1">Tipo de notificación</label>
                  <select id="tipo" name="tipo" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md">
                    <option value="">Todos</option>
                    <option value="reclamacion" {{ request('tipo') == 'reclamacion' ? 'selected' : '' }}>Reclamaciones</option>
                    <option value="renovacion" {{ request('tipo') == 'renovacion' ? 'selected' : '' }}>Renovaciones</option>
                    <option value="mensaje" {{ request('tipo') == 'mensaje' ? 'selected' : '' }}>Mensajes</option>
                  </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                  <label for="prioridad" class="block text-[#60768a] text-sm mb-1">Prioridad</label>
                  <select id="prioridad" name="prioridad" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md">
                    <option value="">Todas</option>
                    <option value="baja" {{ request('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                    <option value="normal" {{ request('prioridad') == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="alta" {{ request('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                    <option value="urgente" {{ request('prioridad') == 'urgente' ? 'selected' : '' }}>Urgente</option>
                  </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                  <label for="estado" class="block text-[#60768a] text-sm mb-1">Estado</label>
                  <select id="estado" name="estado" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md">
                    <option value="">Todos</option>
                    <option value="no_leida" {{ request('estado') == 'no_leida' ? 'selected' : '' }}>No leída</option>
                    <option value="leida" {{ request('estado') == 'leida' ? 'selected' : '' }}>Leída</option>
                    <option value="archivada" {{ request('estado') == 'archivada' ? 'selected' : '' }}>Archivada</option>
                  </select>
                </div>
                <div class="flex items-end">
                  <button type="submit" class="px-4 py-2 bg-[#0b80ee] text-white rounded-md">Buscar</button>
                </div>
              </form>
            </div>
            
            <!-- Listado de notificaciones -->
            <div class="bg-white rounded-xl border border-[#dbe1e6] overflow-hidden">
              <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Referencia</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prioridad</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($notificaciones as $notificacion)
                    <tr data-id="{{ $notificacion->id }}">
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $notificacion->fecha_notificacion->format('d/m/Y H:i') }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">
                          @if($notificacion->tipo == 'reclamacion')
                            Reclamación
                          @elseif($notificacion->tipo == 'renovacion')
                            Renovación
                          @elseif($notificacion->tipo == 'mensaje')
                            Mensaje
                          @else
                            {{ ucfirst($notificacion->tipo) }}
                          @endif
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $notificacion->titulo }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">#{{ $notificacion->numero_referencia }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">
                          @if($notificacion->prioridad == 'baja')
                            <span class="badge badge-info">Baja</span>
                          @elseif($notificacion->prioridad == 'normal')
                            <span class="badge badge-success">Normal</span>
                          @elseif($notificacion->prioridad == 'alta')
                            <span class="badge badge-warning">Alta</span>
                          @elseif($notificacion->prioridad == 'urgente')
                            <span class="badge badge-danger">Urgente</span>
                          @endif
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">
                          @if($notificacion->estado == 'no_leida')
                            <span class="badge badge-warning">No leída</span>
                          @elseif($notificacion->estado == 'leida')
                            <span class="badge badge-success">Leída</span>
                          @elseif($notificacion->estado == 'archivada')
                            <span class="badge badge-info">Archivada</span>
                          @endif
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2 justify-end">
                          <button class="text-[#0b80ee] hover:text-indigo-900" onclick="openModal('modal-{{ $notificacion->id }}')">
                            Ver detalles
                          </button>
                          {{-- <a href="{{ route('admin.notificaciones.ver', $notificacion->id) }}" class="text-[#0b80ee] hover:text-indigo-900">
                            Ver más
                          </a> --}}
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                        No se encontraron notificaciones
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
            
            <!-- Paginación -->
            <div class="flex justify-center mt-4">
                {{ $notificaciones->links('pagination::tailwind') }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modales para las notificaciones -->
    @foreach($notificaciones as $notificacion)
    <div id="modal-{{ $notificacion->id }}" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
      <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 600px; border-radius: 8px;">
        <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px;">
          <h3 class="modal-title" style="margin: 0; font-size: 1.25rem;">{{ $notificacion->titulo }}</h3>
          <span class="close-modal" onclick="closeModal('modal-{{ $notificacion->id }}')" style="cursor: pointer; font-size: 1.5rem;">&times;</span>
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
              <span id="estado-{{ $notificacion->id }}" style="color: #ffc107; font-weight: bold;">No leída</span>
            @elseif($notificacion->estado == 'leida')
              <span id="estado-{{ $notificacion->id }}" style="color: #28a745; font-weight: bold;">Leída</span>
            @elseif($notificacion->estado == 'archivada')
              <span id="estado-{{ $notificacion->id }}" style="color: #17a2b8; font-weight: bold;">Archivada</span>
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
          <p>{{ $notificacion->contenido }}</p>
        </div>
        <div class="modal-footer" style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 15px; padding-top: 10px; border-top: 1px solid #eee;">
          <button class="modal-btn modal-btn-secondary" onclick="closeModal('modal-{{ $notificacion->id }}')" style="padding: 8px 16px; background-color: #f0f2f5; border: none; border-radius: 4px; cursor: pointer;">Cerrar</button>
          @if($notificacion->estado == 'no_leida')
          <button id="btn-marcar-{{ $notificacion->id }}" class="modal-btn modal-btn-primary" onclick="marcarComoLeida('{{ $notificacion->id }}')" style="padding: 8px 16px; background-color: #0b80ee; color: white; border: none; border-radius: 4px; cursor: pointer;">Marcar como leída</button>
          @endif
        </div>
      </div>
    </div>
    @endforeach

    <script>
      function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
      }
      
      function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
      }
      
      function marcarComoLeida(id) {
        // Crear token CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Realizar petición AJAX
        fetch(`/admin/notificaciones/${id}/marcar-leida`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Actualizar el estado en el modal
            const estadoElement = document.getElementById(`estado-${id}`);
            estadoElement.style.color = '#28a745';
            estadoElement.textContent = 'Leída';
            
            // Ocultar el botón
            const btnMarcar = document.getElementById(`btn-marcar-${id}`);
            btnMarcar.style.display = 'none';
            
            // Actualizar el estado en la tabla
            const badgeElement = document.querySelector(`tr[data-id="${id}"] .badge`);
            if (badgeElement) {
              badgeElement.classList.remove('badge-warning');
              badgeElement.classList.add('badge-success');
              badgeElement.textContent = 'Leída';
            }
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
      }
    </script>
    <script src="{{ asset('js/menuresponsive.js') }}"></script>
  </body>
</html>