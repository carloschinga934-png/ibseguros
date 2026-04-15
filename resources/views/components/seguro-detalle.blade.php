<section id="nosotros">
   <div class="banner h-50">
      <img rel="preload" as="image" src="{{ asset($banner) }}">
      <div class="overlay"></div>
      <div class="banner-text">
         <h1>{{ $title }}</h1>
      </div>
   </div>

   <div class="container">
      <h2 class="mt-4 texto-seguro-detalle text-dark fs-2 fw-bold">¿Qué es?</h2>

      <h1 class="mt-4 texto-seguro-detalle fw-semi-bold">{!! $description !!}</h1>

      <h2 class="mt-4 texto-seguro-detalle text-dark fs-2 fw-bold">¿Qué ofrecemos?</h2>

      <section class="contact_section layout_padding-bottom mt-5 mb-5">
         <div class="container-fluid">
            <div class="layout_padding-top layout_padding2-bottom">
               <div class="row g-4">
                  @foreach($offers as $offer)
                     <div class="col-sm-6 col-md-4">
                        <div class="offer-card h-100">
                           <img src="{{ asset($offer->icon) }}" class="img-fluid imagen-seguro-componente">
                           <h3 class="texto-seguro-componente">{!! $offer->label !!}</h3>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </section>
   </div>
</section>