<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Historiales Médicos - IB Seguros</title>
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
              <p class="text-[#111518] tracking-light text-[32px] font-bold leading-tight min-w-72">Historiales Médicos Digitales</p>
              <a href="{{ route('admin.dashboard') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Volver al panel</span>
              </a>
            </div>
            
            <!-- Filtros de búsqueda -->
            <div class="bg-white rounded-xl border border-[#dbe1e6] p-4 mb-6">
              <form action="" method="GET" class="flex flex-wrap gap-3">
                <div class="flex-1 min-w-[200px]">
                  <label for="nombre" class="block text-[#60768a] text-sm mb-1">Nombre del cliente</label>
                  <input type="text" id="nombre" name="nombre" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md" placeholder="Buscar por nombre" value="{{ request('nombre') }}">
                </div>
                <div class="flex-1 min-w-[200px]">
                  <label for="dni" class="block text-[#60768a] text-sm mb-1">DNI</label>
                  <input type="text" id="dni" name="dni" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md" placeholder="Buscar por DNI" value="{{ request('dni') }}">
                </div>
                <div class="flex-1 min-w-[200px]">
                  <label for="tipo_seguro" class="block text-[#60768a] text-sm mb-1">Tipo de seguro</label>
                  <select id="tipo_seguro" name="tipo_seguro" class="w-full px-3 py-2 border border-[#dbe1e6] rounded-md">
                    <option value="">Todos</option>
                    @foreach($tiposSeguros as $tipo)
                      <option value="{{ $tipo }}" {{ request('tipo_seguro') == $tipo ? 'selected' : '' }}>{{ ucfirst($tipo) }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="flex items-end">
                  <button type="submit" class="px-4 py-2 bg-[#0b80ee] text-white rounded-md">Buscar</button>
                </div>
              </form>
            </div>
            
            <!-- Listado de clientes con historiales médicos -->
            <div class="bg-white rounded-xl border border-[#dbe1e6] overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Seguro</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contratación</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vencimiento</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @forelse($polizas as $poliza)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $poliza->historialMedico->user->name }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $poliza->historialMedico->user->dni }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ ucfirst($poliza->tipo_seguro) }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $poliza->fecha_contratacion->format('d/m/Y') }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $poliza->fecha_vencimiento->format('d/m/Y') }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.historial-medico', ['id' => $poliza->historialMedico->id]) }}" class="text-[#0b80ee] hover:text-indigo-900">Ver historial</a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        No se encontraron historiales médicos
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            
            <!-- Paginación -->
            <div class="flex justify-center mt-4">
              {{ $polizas->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/menuresponsive.js') }}"></script>
  </body>
</html>