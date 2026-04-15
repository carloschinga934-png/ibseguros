<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarruselItem extends Component
{
    public $url;
    public $imgSrc;
    public $imgAlt;

    public function __construct($url, $imgSrc, $imgAlt = '')
    {
        $this->url = $url;
        $this->imgSrc = $imgSrc;
        $this->imgAlt = $imgAlt;
    }

    public function render()
    {
        return view('components.carrusel-item');
    }
}