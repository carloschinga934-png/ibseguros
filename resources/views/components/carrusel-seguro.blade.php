<section id="bloghome">
   <div class="container mb-5 wow animate__animated animate__fadeInUp" data-wow-duration="3s">
      <div class="carousel">
         <div class="text-center logo__blog">
            <h2 class="mt-4le fw-bold" style="margin-top:30px">{{ $title}}</h2>
         </div>

         <div class="carousel__contenedor_blog">
            @if ($isFeatures ?? false)
               <!-- Se ejecuta si $isFeatures es true -->
               <button class="carousel__anterior_blog">
                  <img src="/images/flecha2.webp" alt="Anterior">
               </button>
               <button class="carousel__siguiente_blog">
                  <img src="/images/flecha1.webp" alt="Anterior">
               </button>
               <div class="carousel__lista_blog">
                  <!-- Se ejecuta si $isFeatures es true -->
                  @foreach ($seguro as $item)
                     <x-carousel-card :image="$item->image" :title="$item->title" :sinopsis="$item->sinopsis"
                        :features="$item->features" :isFeatures="$isFeatures" :link="$item->link" />
                  @endforeach
               </div>
            @else
               <!-- Se ejecuta si $isFeatures es false o no está definido -->
               <button arial-label="Anterior" class="carousel__anterior_blog">
                  <i class="fas fa-angle-left"></i>
               </button>
               <button arial-label="Siguiente" class="carousel__siguiente_blog">
                  <i class="fas fa-angle-right"></i>
               </button>

               <div class="carousel__lista_blog">
                  <!-- Se ejecuta si $isFeatures es true -->
                  @foreach ($seguro as $item)
                     <x-carousel-card :image="$item->image" :title="$item->title" :sinopsis="$item->sinopsis"
                        :features="$item->features" :isFeatures="$isFeatures" :link="$item->link" />
                  @endforeach
               </div>
            @endif
         </div>
      </div>
   </div>
</section>