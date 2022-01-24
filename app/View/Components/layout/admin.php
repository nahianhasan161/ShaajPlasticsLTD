<?php

namespace App\View\Components\layout;

use Illuminate\View\Component;

class admin extends Component
{
   public $dashboard = false;
   public $title ;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($dashboard = false,$title = "Dashboard")
    {

        $this->dashboard = $dashboard;
         $this->title = $title ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.admin')->with(['title'=>$this->title,'dashboard'=>$this->dashboard]);
    }
}
