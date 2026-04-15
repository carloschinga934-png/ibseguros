<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NavItem extends Component
{
   public string $route;
   public string $icon;
   public string $label;
   public bool $external;

   /**
    * Create a new component instance.
    */
   public function __construct(string $route = '#', string $icon = '', string $label = '', bool $external = false)
   {
      $this->route = $route;
      $this->icon = $icon;
      $this->label = $label;
      $this->external = $external;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.nav-item');
   }
}
