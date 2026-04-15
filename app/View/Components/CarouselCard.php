<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CarouselCard extends Component
{
    public $title;
    public $isFeatures;
    public $image;
    public $features;
    public $sinopsis;
    public $link;

    public function __construct($title, $isFeatures, $image, $features, $sinopsis, $link)
    {
        $this->title = $title;
        $this->isFeatures = $isFeatures;
        $this->image = $image;
        $this->features = $features;
        $this->sinopsis = $sinopsis;
        $this->link = $link;
    }

    public function render(): View|Closure|string
    {
        return view('components.carousel-card');
    }
}
