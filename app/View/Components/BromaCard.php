<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BromaCard extends Component
{
    public $broma;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($broma)
    {
        $this->broma = $broma;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.broma-card');
    }
}
