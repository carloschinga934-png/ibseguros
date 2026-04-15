<div class="carousel__elemento">
   @if ($isFeatures ?? true)
      <!-- Se ejecuta si $isFeatures es true -->
      <a href="{{ url('/seguros/' . $link) ?? '#' }}" class="enlace_personalizado text-decoration-none">
         <div class="container-fluid cards-inicio">
            <div class="lista_elementos container homeport1">
               <div class="card_elemento">
                  <div class="card__blog" style="border-radius:50px; height:371px">
                     <img src="{{ asset($image)  }}" style="height: 299px;width: 100%;" />
                     <div class="mensaje_hover">
                        @foreach ($features as $feature)
                           <p>{!!$feature !!}</p>
                        @endforeach
                     </div>
                     <div class="p-4 hover-title-card">
                        <p class="p-0 m-0 text-center">{{ $title }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </a>
   @else
      <div class="container-fluid cards-inicio">
         <div class="lista_elementos container homeport1">
            <div class="card_elemento">
               <div class="card__blog">
                  <img src="{{ asset($image)  }}" style="height: 194px;width: 100%;" />
                  <div class="p-3 bg-white">
                     <h5 class="fw-semibold fs-6">{{ $title }}</h5>
                     <p class="p-0 m-0 text-justify text-secondary">{{ $sinopsis }}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endif
</div>