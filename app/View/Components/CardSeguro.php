<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CardSeguro extends Component
{
   public $image;
   public $title;
   public $items;
   public $link;

   public function __construct($image, $title, $items = [], $link = '#')
   {
      $this->image = $image;
      $this->title = $title;
      $this->items = $items;
      $this->link = $link;
   }

   public function render(): View|Closure|string
   {
      return view('components.card-seguro');
   }
}
