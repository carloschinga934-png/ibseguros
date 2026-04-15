<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Historial Médico Digital - IB Seguros</title>
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
              <div>
                <p class="text-[#111518] tracking-light text-[32px] font-bold leading-tight min-w-72">Historial Médico Digital</p>
                <p class="text-[#60768a] text-base">Cliente: {{ $cliente->name ?? 'Nombre del Cliente' }}</p>
              </div>
              <a href="{{ route('cliente.polizas.index') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Volver a mis pólizas</span>
              </a>
            </div>
            
            <!-- Información del cliente -->
            <div class="bg-white rounded-xl border border-[#dbe1e6] p-6 mb-6">
              <h2 class="text-[#111518] text-[18px] font-bold mb-4">Información Personal</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <p class="text-[#60768a] text-sm">Nombre completo:</p>
                  <p class="text-[#111518] font-medium">{{ $cliente->name }}</p>
                </div>
                <div>
                  <p class="text-[#60768a] text-sm">DNI:</p>
                  <p class="text-[#111518] font-medium">{{ $cliente->dni }}</p>
                </div>
                <div>
                  <p class="text-[#60768a] text-sm">Teléfono:</p>
                  <p class="text-[#111518] font-medium">{{ $cliente->telefono }}</p>
                </div>
                <div>
                  <p class="text-[#60768a] text-sm">Email:</p>
                  <p class="text-[#111518] font-medium">{{ $cliente->email }}</p>
                </div>
              </div>
            </div>
            
            <!-- Pólizas de salud -->
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Pólizas de Salud</h2>
            
            @forelse($historial->polizas as $poliza)
            <div class="bg-white rounded-xl border border-[#dbe1e6] p-6 mb-6">
              <div class="flex justify-between items-center mb-4">
                <h3 class="text-[#111518] text-[18px] font-bold">{{ $poliza->tipo_seguro }}</h3>
                <span class="px-3 py-1 {{ $poliza->estado == 'activo' ? 'bg-green-100 text-green-800' : ($poliza->estado == 'vencido' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }} rounded-full text-sm font-medium">{{ ucfirst($poliza->estado) }}</span>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                  <p class="text-[#60768a] text-sm">Número de póliza:</p>
                  <p class="text-[#111518] font-medium">{{ $poliza->numero_poliza }}</p>
                </div>
                <div>
                  <p class="text-[#60768a] text-sm">Fecha de contratación:</p>
                  <p class="text-[#111518] font-medium">{{ $poliza->fecha_contratacion->format('d/m/Y') }}</p>
                </div>
                <div>
                  <p class="text-[#60768a] text-sm">Fecha de vencimiento:</p>
                  <p class="text-[#111518] font-medium">{{ $poliza->fecha_vencimiento->format('d/m/Y') }}</p>
                </div>
                <div>
                  <p class="text-[#60768a] text-sm">Prima anual:</p>
                  <p class="text-[#111518] font-medium">S/. {{ number_format($poliza->prima_anual, 2) }}</p>
                </div>
              </div>
              
              <!-- Coberturas -->
              <h4 class="text-[#111518] text-[16px] font-bold mb-3">Coberturas incluidas</h4>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                @foreach($poliza->coberturas as $cobertura)
                <div class="border border-[#dbe1e6] rounded-lg p-3">
                  <p class="text-[#111518] font-medium">{{ $cobertura->nombre }}</p>
                  <p class="text-[#60768a] text-sm">{{ $cobertura->descripcion }}</p>
                  <p class="text-[#0b80ee] text-sm font-medium mt-1">Límite: {{ $cobertura->limite }}</p>
                </div>
                @endforeach
              </div>
              
              <!-- Historial de atenciones médicas -->
              <h4 class="text-[#111518] text-[16px] font-bold mb-3">Historial de atenciones médicas</h4>
              @if($poliza->atenciones->count() > 0)
              <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead>
                    <tr>
                      <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                      <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                      <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Centro médico</th>
                      <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diagnóstico</th>
                      <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($poliza->atenciones->sortByDesc('fecha') as $atencion)
                    <tr>
                      <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $atencion->fecha->format('d/m/Y') }}</td>
                      <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $atencion->tipo }}</td>
                      <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $atencion->centro_medico }}</td>
                      <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $atencion->diagnostico }}</td>
                      <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">S/. {{ number_format($atencion->monto, 2) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              @else
              <p class="text-[#60768a] text-sm">No hay atenciones médicas registradas para esta póliza.</p>
              @endif
            </div>
            @empty
            <div class="bg-white rounded-xl border border-[#dbe1e6] p-6 mb-6">
              <p class="text-[#60768a] text-sm">No hay pólizas de salud registradas para este cliente.</p>
            </div>
            @endforelse
            
            <!-- Botón para descargar PDF -->
            <div class="flex justify-end px-4 py-4">
              <a href="{{ route('cliente.dashboard') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#0b80ee] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Volver al panel</span>
              </a>
            </div>
            
            <!-- Botones de acción -->
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-start">
                <a href="{{ route('cliente.polizas.pdf', ['id' => $poliza->id]) }}" 
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#0b80ee] text-white text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Descargar historial completo</span>
                </a>
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f0f2f5] text-[#111518] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Enviar por email</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/menuresponsive.js') }}"></script>
  </body>
</html>