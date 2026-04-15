<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Stitch Design</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: "Public Sans", "Noto Sans", sans-serif;'>
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
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Resumen de actividades recientes</h2>
            <div class="flex flex-wrap gap-4 p-4">
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Nuevas pólizas emitidas</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">25</p>
              </div>
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Reclamaciones pendientes</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">12</p>
              </div>
              <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#dbe1e6]">
                <p class="text-[#111518] text-base font-medium leading-normal">Mensajes de clientes</p>
                <p class="text-[#111518] tracking-light text-2xl font-bold leading-tight">8</p>
              </div>
            </div>
            <h2 class="text-[#111518] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Notificaciones</h2>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex flex-col justify-center">
                <p class="text-[#111518] text-base font-medium leading-normal line-clamp-1">Reclamación urgente</p>
                <p class="text-[#60768a] text-sm font-normal leading-normal line-clamp-2">Reclamación #12345 - Accidente de tráfico</p>
              </div>
              <div class="shrink-0"><button class="text-base font-medium leading-normal">Ver detalles</button></div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex flex-col justify-center">
                <p class="text-[#111518] text-base font-medium leading-normal line-clamp-1">Recordatorio de renovación</p>
                <p class="text-[#60768a] text-sm font-normal leading-normal line-clamp-2">Póliza #67890 - Vence el 15 de julio</p>
              </div>
              <div class="shrink-0"><button class="text-base font-medium leading-normal">Ver detalles</button></div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex flex-col justify-center">
                <p class="text-[#111518] text-base font-medium leading-normal line-clamp-1">Nuevo mensaje del cliente</p>
                <p class="text-[#60768a] text-sm font-normal leading-normal line-clamp-2">Cliente: Sofía Rodríguez - Consulta sobre cobertura</p>
              </div>
              <div class="shrink-0"><button class="text-base font-medium leading-normal">Ver detalles</button></div>
            </div>
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
  </body>
</html>
