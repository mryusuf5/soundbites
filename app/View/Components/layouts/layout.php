<?php

namespace App\View\Components\layouts;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class layout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.layout');
    }
}
