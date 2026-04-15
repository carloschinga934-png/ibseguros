document.addEventListener("DOMContentLoaded", function () {
   var selectTipoPersona = document.getElementById("tipopersona");
   var camposPersonaNatural = document.querySelectorAll(".campos-persona-natural");
   var camposPersonaEmpresa = document.querySelectorAll(".campos-persona-empresa");

   function ocultarTodosLosCampos() {
      camposPersonaNatural.forEach(function (campo) {
         campo.style.display = "none";
      });
      camposPersonaEmpresa.forEach(function (campo) {
         campo.style.display = "none";
      });
   }

   ocultarTodosLosCampos();

   selectTipoPersona.addEventListener("change", function () {
      ocultarTodosLosCampos();
      var opcionSeleccionada = selectTipoPersona.value;

      if (opcionSeleccionada === "Persona Natural") {
         camposPersonaNatural.forEach(function (campo) {
            campo.style.display = "block";
         });
      } else if (opcionSeleccionada === "Persona con Empresa") {
         camposPersonaEmpresa.forEach(function (campo) {
            campo.style.display = "block";
         });
      }
   });

   tipoSeguroSelect.disabled = true;
   //tipoSeguroEmpresaSelect.disabled = true;
   var modal = document.getElementById("myModal");
   var closeButton = document.querySelector(".close");
});

document.getElementById("tipoSeguro").disabled = false;
//document.getElementById("tipoSeguroEmpresa").disabled = false;

