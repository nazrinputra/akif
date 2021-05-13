<?php

namespace App\View\Components;

use App\Models\Queue;
use Illuminate\View\Component;

class Queues extends Component
{
    public $status;

    public $queues;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status, $queues)
    {
        $this->status = $status;

        $this->queues = $queues;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.queues');
    }
}
