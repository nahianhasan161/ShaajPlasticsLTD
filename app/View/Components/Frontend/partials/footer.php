<?php

namespace App\View\Components\Frontend\partials;

use Illuminate\View\Component;

class footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public $details;
    public function __construct($categories=[],$details=[])
    {
        $this->categories = $categories;
        $this->details = $details;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.partials.footer');
    }
}
