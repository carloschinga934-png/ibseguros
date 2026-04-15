window.addEventListener('load', function () {
   console.log("Iniciando configuración de carruseles...");

   function iniciarAutoplay(glider, delay = 5000) {
      let autoplayInterval;
      let currentIndex = 0;
      const slidesCount = glider.track.childElementCount;

      function iniciarIntervalo() {
         autoplayInterval = setInterval(function () {
            currentIndex = (currentIndex + 1) % slidesCount;
            glider.scrollItem(currentIndex);
         }, delay);
      }

      iniciarIntervalo();

      glider.container.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
      glider.container.addEventListener('mouseleave', iniciarIntervalo);
   }

   const carruseles = document.querySelectorAll(".carousel__lista_blog");

   carruseles.forEach((elementoCarrusel) => {
      const contenedor = elementoCarrusel.closest('.carousel__contenedor_blog');
      if (!contenedor) return; // si no existe, no hace nada

      const glider = new Glider(elementoCarrusel, {
         slidesToShow: 1,
         slidesToScroll: 1,
         draggable: true,
         arrows: {
            prev: contenedor.querySelector('.carousel__anterior_blog'),
            next: contenedor.querySelector('.carousel__siguiente_blog')
         },
         responsive: [
            { breakpoint: 280, settings: { slidesToShow: 1 } },
            { breakpoint: 768, settings: { slidesToShow: 2 } },
            { breakpoint: 992, settings: { slidesToShow: 3 } }
         ]
      });

      iniciarAutoplay(glider, 5000);
   });
});