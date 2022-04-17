<?php

namespace App\View\Components\admin\partials;

use Illuminate\View\Component;

class mainsidebar extends Component
{
    public $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active='dashboard')
    {
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.partials.mainsidebar');
    }
}
