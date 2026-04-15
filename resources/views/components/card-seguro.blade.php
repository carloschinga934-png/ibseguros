<div class="info-div">
   <img src="{{ $image }}" alt="{{ $title }}">
   <div class="info-text">
      <h3>{{ $title }}</h3>
      <ul>
         @foreach ($items as $item)
            <li>{{ $item }}</li>
         @endforeach
      </ul>
      <a href="{{ url('/seguros/' . $link) ?? '#' }}" class="enlace-leer">Leer más</a>
   </div>
</div>