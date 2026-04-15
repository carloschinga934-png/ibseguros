
/*El caso que estemos en la pagina de detalles*/

/* procuramos que la página haya cargado en su totalidad incluido los llamados php*/

window.addEventListener('load', function () {
   const image_profile = this.document.querySelector("#image__profile"),
      carousel_element = this.document.querySelectorAll(".carousel__element");
   /* Se pregunta si hay imagenes cargadas, verficando si hay imagenes en el carousel*/
   if (carousel_element.length == 0) {
      /*Solo se imprime la imagen de no existe foto*/
      // image_profile.style.backgroundImage = "url('views/images/imagenes_vehiculos/nofoto.webp')";
      image_profile.innerHTML = `<img width='100%' height='100%' src='views/images/nofoto.webp'>`
   } else {
      /* Se crea el carousel*/
      new Glider(document.querySelector('.carousel__list'), {
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: {
            prev: '.carousel__prev',
            next: '.carousel__next'
         },
         responsive: [
            {
               // screens greater than >= 775px
               breakpoint: 550,
               settings: {
                  // Set to `auto` and provide item width to adjust to viewport
                  slidesToShow: 2,
                  slidesToScroll: 1
               }
            }, {
               // screens greater than >= 1024px
               breakpoint: 775,
               settings: {
                  slidesToShow: 4,
                  slidesToScroll: 2
               }
            }
         ]
      });

      const image_list = this.document.querySelectorAll(".element__image");
      // image_profile.style.backgroundImage = "url('"+image_list[0].src+"')";
      image_profile.innerHTML = `<img width='100%' height='100%' src=${image_list[0].src}>`

      image_list.forEach(image => {
         image.addEventListener("click", () => {
            // image_profile.style.backgroundImage = "url('"+image.src+"')" 

            if (image.dataset.type === 'image') {
               image_profile.innerHTML = `<img width='100%' height='100%' src=${image.src}>`
            }
         })
      })
   }
});


const validarCampo = (expresion, input, campo) => {
   if (expresion.test(input.value)) {
      document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
      document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
      document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
      document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
      document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
   } else {
      document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
      document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
      document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
      document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
      document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
   }
}

if ($("#FormContacto").length > 0) {

   const inputs = document.querySelectorAll('#FormContacto .formulario__grupo-input');

   const expresiones = {
      nombres: /^[a-zA-Z]{1}[a-zA-Z\s]{3,36}$/, // Letras mayusculas, minusculas y espacios; no se puede iniciar con espacios
      telefono: /^[1-7]{1}\d{6}$/,// 7 digitos y no empiece por cero.
      celular: /^[1-9]{1}\d{8}$/,// 9 digitos y no empiece por cero.
      correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,// Validación simple de correo
      dni: /^[1-8]{1}\d{7}$/,// 8 digitos y no empiece por cero.
      comentario: /^[a-zA-Z0-9,áéíóúÁÉÍÓÚñÑ\s]{10,500}$/ // comentarios que solo contengan letras, numeros y espacios
   }

   const validarFormulario = (e) => {
      switch (e.target.name) {
         case "nombres":
            validarCampo(expresiones.nombres, e.target, 'nombres');
            break;
         case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
            break;
         case "celular":
            validarCampo(expresiones.celular, e.target, 'celular');
            break;
         case "correo":
            validarCampo(expresiones.correo, e.target, 'correo');
            break;
         case "dni":
            validarCampo(expresiones.dni, e.target, 'dni');
            break;
         case "comentario":
            validarCampo(expresiones.comentario, e.target, 'comentario');
            break;
      }
   }

   inputs.forEach((input) => {
      input.addEventListener('keyup', validarFormulario);
      input.addEventListener('blur', validarFormulario);
   });
}





