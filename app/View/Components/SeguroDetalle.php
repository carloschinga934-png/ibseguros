<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SeguroDetalle extends Component
{
    public $title;
    public $banner;
    public $description;
    public $offers;

    public function __construct($title, $banner, $description, $offers = [])
    {
        $this->title = $title;
        $this->banner = $banner;
        $this->description = $description;
        $this->offers = $offers;
    }

    public function render(): View|Closure|string
    {
        return view('components.seguro-detalle');
    }
}
