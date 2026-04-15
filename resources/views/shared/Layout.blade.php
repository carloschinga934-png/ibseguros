<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="keywords" content="IBseguro, seguro, seguro Lima, seguro Perú">

   <title>IBSeguros</title>

   <!-- Favicon -->
   <link href="{{ asset('images/ibseguros2.webp') }}" rel="shortcut icon">
   <link href="{{ asset('images/ibseguros2.webp') }}" rel="icon">

   <!-- ======== ESTILOS GLOBALES ======== -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous" />
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
   <link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <link rel="stylesheet" href="{{ asset('css/btnstyles/btncima.css') }}">
   <link rel="stylesheet" href="{{ asset('css/btnstyles/btnwsp.css') }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

   <!-- ======== SCRIPTS GLOBALES ======== -->
   <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('js/glider.min.js') }}"></script>
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/menuresponsive.js') }}"></script>
   <script src="{{ asset('js/carrousel-inicio.js') }}"></script>
   <script src="{{ asset('js/tipodepersona.js') }}"></script>
   <script src="{{ asset('js/validaciones.js') }}"></script>

   <script>
      function check(e) {
         let tecla = (document.all) ? e.keyCode : e.which;

         // Tecla de retroceso siempre permitida
         if (tecla == 8) {
            return true;
         }

         // Solo letras y espacios
         let patron = /[A-Za-zñÑ\s]/;
         let tecla_final = String.fromCharCode(tecla);
         return patron.test(tecla_final);
      }
   </script>
</head>

<body>
   @include('shared.partials.header') <!-- MENU -->

   <div style="flex: 1;">
      <main role="main">
         {!! $renderBody !!}
      </main>
   </div>

   @include('shared.partials.footer') <!-- FOOTER -->
</body>
</html>
