<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CarruselSeguro extends Component
{
   public $title;
   public $isFeatures;
   public $seguro;

   public function __construct($title, $isFeatures, $seguro)
   {
      $this->title = $title;
      $this->isFeatures = $isFeatures;
      $this->seguro = $seguro;
   }

   public function render(): View|Closure|string
   {
      return view('components.carrusel-seguro');
   }
}
