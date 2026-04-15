document.addEventListener('DOMContentLoaded', function () {
   const carouselEl = document.querySelector('#carouselExampleControls');
   if (carouselEl) {
      const carousel = new bootstrap.Carousel(carouselEl, {
         interval: 3000
      });

      const prevBtn = document.querySelector('.carousel-control-prev');
      const nextBtn = document.querySelector('.carousel-control-next');

      if (prevBtn) prevBtn.addEventListener('click', () => carousel.prev());
      if (nextBtn) nextBtn.addEventListener('click', () => carousel.next());
   }
});