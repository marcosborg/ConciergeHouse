<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ContentPage;
use App\Models\Nav;

class Navmenu extends Component
{
    private $navs;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->navs = Nav::orderBy('position')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navmenu')->with('navs', $this->navs);
    }
}
