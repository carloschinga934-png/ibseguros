<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ContactoFormulario extends Component
{
   public function __construct()
   {

   }

   public function render(): View|Closure|string
   {
      return view('components.contacto-formulario');
   }
}
