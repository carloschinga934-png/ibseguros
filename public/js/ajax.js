$(document).ready(function () {
   const tipoPersona = document.getElementById('tipopersona');
   const formPersona = document.getElementById('formPersona');
   const formEmpresa = document.getElementById('formEmpresa');

   if (tipoPersona && formPersona && formEmpresa) {
      tipoPersona.addEventListener('change', function () {
         if (this.value === 'Persona Natural') {
            formPersona.style.display = 'block';
            formEmpresa.style.display = 'none';
         } else if (this.value === 'Persona con Empresa') {
            formPersona.style.display = 'none';
            formEmpresa.style.display = 'block';
         } else {
            formPersona.style.display = 'none';
            formEmpresa.style.display = 'none';
         }
      });

      formPersona.style.display = 'none';
      formEmpresa.style.display = 'none';
   }

   $('form.ajaxpersona').submit(function (e) {
      e.preventDefault();
      var $form = $(this);
      $form.find('[type="submit"]').prop('disabled', true);

      $.ajax({
         url: "/enviar-form-persona-contacto",
         type: 'post',
         data: $form.serialize(),
         beforeSend: function () {
            $("#spinnerPersona").show();
         },
      }).done(function (data) {
         $("#spinnerPersona").hide();
         if (data.status === 'success') {
            Swal.fire('Mensaje enviado', 'Con éxito', 'success');
            $form[0].reset();
         } else {
            Swal.fire('Error de Envío', 'Vuelva a intentarlo más tarde', 'error');
         }
         $form.find('[type="submit"]').prop('disabled', false);
      }).fail(function () {
         $("#spinnerPersona").hide();
         Swal.fire('Error de Servidor', 'No se pudo enviar el mensaje', 'error');
         $form.find('[type="submit"]').prop('disabled', false);
      });
   });

   $('form.ajaxempresa').submit(function (e) {
      e.preventDefault();
      var $form = $(this);
      $form.find('[type="submit"]').prop('disabled', true);

      $.ajax({
         url: "/enviar-form-empresa-contacto",
         type: 'post',
         data: $form.serialize(),
         beforeSend: function () {
            $("#spinnerEmpresa").show();
         },
      }).done(function (data) {
         $("#spinnerEmpresa").hide();
         if (data.status === 'success') {
            Swal.fire('Mensaje enviado', 'Con éxito', 'success');
            $form[0].reset();
         } else {
            Swal.fire('Error de Envío', 'Vuelva a intentarlo más tarde', 'error');
         }
         $form.find('[type="submit"]').prop('disabled', false);
      }).fail(function () {
         $("#spinnerEmpresa").hide();
         Swal.fire('Error de Servidor', 'No se pudo enviar el mensaje', 'error');
         $form.find('[type="submit"]').prop('disabled', false);
      });
   });

   $('form.ajaxcontacto').submit(function (e) {
      e.preventDefault();
      var $form = $(this);
      $form.find('[type="submit"]').prop('disabled', true);

      $.ajax({
         url: "/enviar-form-general-contacto",
         type: 'post',
         data: $form.serialize(),
         beforeSend: function () {
            $("#spinnerPersona").show();
         },
      }).done(function (data) {
         $("#spinnerPersona").hide();
         if (data.status === 'success') {
            Swal.fire('Mensaje enviado', 'Con éxito', 'success');
            $form[0].reset();
         } else {
            Swal.fire('Error de Envío', 'Vuelva a intentarlo más tarde', 'error');
         }
         $form.find('[type="submit"]').prop('disabled', false);
      }).fail(function () {
         $("#spinnerPersona").hide();
         Swal.fire('Error de Servidor', 'No se pudo enviar el mensaje', 'error');
         $form.find('[type="submit"]').prop('disabled', false);
      });
   });
});