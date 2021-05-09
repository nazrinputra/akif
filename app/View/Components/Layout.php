<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public $title;

    public $stores;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $stores)
    {
        $this->title = $title;
        $this->stores = $stores;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout');
    }
}
