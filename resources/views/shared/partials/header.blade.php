<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #003881, #3F9AC0)"
   id="body">

   <!-- LOGO -->
   <a class="navbar-brand" href="{{ route('inicio') }}">
      <img src="{{ asset('images/ibseguros3.webp') }}" alt="IBSeguros" height="50">
   </a>

   <!-- icono menu responsive -->
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>

   <!-- menu de opciones -->
   <div class="collapse navbar-collapse" id="mainNavbar" style="justify-content: center; text-align: center;">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
         <li class="nav-item">
            <a class="nav-link" href="{{ route('seguros') }}">
               <img src="{{ asset('images/logo-blanco.webp') }}" height="35" class="me-2" alt="Seguros">Seguros
            </a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="{{ route('agentes') }}">
               <img src="{{ asset('images/agente.webp') }}" height="35" class="me-2" alt="Agente">Agente
            </a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="{{ route('nosotros') }}">
               <img src="{{ asset('images/building.webp') }}"
                  style="filter:invert(100%) sepia(6%) saturate(480%) hue-rotate(153deg) brightness(200%) contrast(98%);"
                  height="35" class="me-2" alt="Nosotros">Nosotros
            </a>
         </li>

         <!-- <li class="nav-item">
            <a class="nav-link" href="https://ibseguros.blogspot.com">
               <img src="{{ asset('images/blog.webp') }}" height="35" class="me-2" alt="Blog">Blog
            </a>
         </li> -->

         <li class="nav-item">
            <a class="nav-link" href="{{ route('contacto') }}">
               <img src="{{ asset('images/contacto_1.webp') }}" height="35" class="me-2" alt="Contacto">Contacto
            </a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="{{ route('consultas') }}">
               <img src="{{ asset('images/contacto_1.webp') }}" height="35" class="me-2" alt="Consultas">Consultas
            </a>
         </li>
      </ul>

      <!-- botones inicio_sesion/registrate y cerrar_sesion/perfil -->
      <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center gap-2 mb-4 mt-4 me-2">
         @auth
            <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
            </form>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">Perfil</a>
         @else
            <a href="{{ route('auth.login') }}" class="btn btn-outline-light btn-primary">Iniciar sesión</a>
            <a href="{{ route('auth.register') }}" class="btn btn-primary">Registrarse</a>
         @endauth
      </div>

      <!-- redes sociales -->
      <div class="d-lg-none d-flex justify-content-center">
         <a href="https://www.facebook.com/people/IBSeguros/61553572664864/" target="_blank" class="text-white me-2"
            style="text-decoration: none;">
            <i class="fa-brands fa-facebook-f"></i>
         </a>

         <a href="https://www.linkedin.com/company/corporación-ibseguros/" target="_blank" class="text-white me-2"
            style="text-decoration: none;">
            <i class="fa-brands fa-linkedin-in"></i>
         </a>

         <a href="https://www.tiktok.com/@corporacionibgroup" target="_blank" class="text-white me-2"
            style="text-decoration: none;">
            <i class="fa-brands fa-tiktok"></i>
         </a>

         <a href="https://www.instagram.com/corporacionibseguros/" target="_blank" class="text-white"
            style="text-decoration: none;">
            <i class="fa-brands fa-instagram"></i>
         </a>
      </div>
   </div>
</nav>