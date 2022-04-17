<?php

namespace App\View\Components\Frontend\partials;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $details = '';
    public $active = 'services';
    public $term = '';
    public function __construct($details= '',$active = '',$term = '')
    {
    $this->details = $details;
    $this->active = $active;
    $this->term = $term;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.partials.header');
    }
}
