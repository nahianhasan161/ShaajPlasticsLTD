<?php

namespace App\View\Components\admin\partials;

use Illuminate\View\Component;

class maincontent extends Component
{
    public $title ;
    public $root ;
    public $child ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title =  "Dashboard",$root = "Home",$child = "Dashboard")
    {
        $this->title = $title;
        $this->root = $root;
        $this->child = $child;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.partials.maincontent');
    }
}
