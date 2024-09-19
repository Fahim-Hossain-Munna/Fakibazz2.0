<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcum extends Component
{
    /**
     * Create a new component instance.
     */
    public $munna;
    public function __construct($munna)
    {
        $this->munna = $munna;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcum');
    }
}
