<li class="nav-item">
   @if ($external)
      <a class="nav-link" href="{{ $route }}" target="_blank">
         <img src="{{ asset($icon) }}" height="35" class="me-2" alt="{{ $label }}">
         {{ $label }}
      </a>
   @else
      <a class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}" href="{{ route($route) }}">
         <img src="{{ asset($icon) }}" height="35" class="me-2" alt="{{ $label }}">
         {{ $label }}
      </a>
   @endif
</li>