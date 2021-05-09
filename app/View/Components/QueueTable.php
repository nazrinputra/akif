<?php

namespace App\View\Components;

use Illuminate\View\Component;

class QueueTable extends Component
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
        return view('components.queue-table');
    }
}
