<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>
<body>
    <!-- Incluir el header -->
    @include('shared.partials.header')
    
    <div class="relative flex size-full min-h-screen flex-col bg-slate-50 group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        
        <div class="px-4 md:px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col w-full md:w-[512px] max-w-[512px] py-5 flex-1">
            <h2 class="text-[#0d141c] tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">Registro de Usuario</h2>
            <!-- Después del título y antes del formulario -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="auth-form" action="{{ route('auth.register.post') }}" method="post">
              @csrf
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Tipo de Usuario <span class="text-[#e91e63]">*</span></p>
                  <select
                    id="tipo"
                    name="tipo"
                    class="form-select flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    required
                  >
                    <option value="">Seleccione una opción</option>
                    <option value="cliente">Cliente</option>
                    <option value="supervisor">Supervisor</option>
                  </select>
                </label>
              </div>
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">DNI <span class="text-[#e91e63]">*</span></p>
                  <input
                    type="text"
                    id="dni"
                    name="dni"
                    placeholder="Ingrese su DNI"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    maxlength="8"
                    pattern="[0-9]{8}"
                    required
                  />
                </label>
              </div>
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Nombres <span class="text-[#e91e63]">*</span></p>
                  <input
                    type="text"
                    id="nombres"
                    name="nombres"
                    placeholder="Ingrese sus nombres"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    required
                  />
                </label>
              </div>
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Apellidos <span class="text-[#e91e63]">*</span></p>
                  <input
                    type="text"
                    id="apellidos"
                    name="apellidos"
                    placeholder="Ingrese sus apellidos"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    required
                  />
                </label>
              </div>
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Correo Electrónico <span class="text-[#e91e63]">*</span></p>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu correo electrónico"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    required
                  />
                </label>
              </div>
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Contraseña <span class="text-[#e91e63]">*</span></p>
                  <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu contraseña"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    required
                  />
                </label>
              </div>
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Confirmar Contraseña <span class="text-[#e91e63]">*</span></p>
                  <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirma tu contraseña"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    required
                  />
                </label>
              </div>
              
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Teléfono <span class="text-[#e91e63]">*</span></p>
                  <input
                    type="tel"
                    id="telefono"
                    name="telefono"
                    placeholder="Ingrese su teléfono"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                    maxlength="9"
                    pattern="[0-9]{9}"
                    required
                  />
                </label>
              </div>
              
              <div class="flex px-4 py-3">
                <button
                  type="submit"
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#4196f6] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">REGISTRARSE</span>
                </button>
              </div>
              <p class="text-[#49709c] text-sm font-normal leading-normal pb-3 pt-1 px-4 text-center">
                ¿Ya tienes una cuenta? <a href="{{ route('auth.login') }}" class="underline">Iniciar sesión</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/menuresponsive.js') }}"></script>
</body>
</html>