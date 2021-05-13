<?php

namespace App\View\Components;

use App\Models\Store;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $stores;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->stores = Store::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
