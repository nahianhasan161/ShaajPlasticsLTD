<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Livewire\Component;

class RequestTable extends Component
{
    public function getRequestsProperty(){
        return Request::paginate();
    }
    public function render()
    {
        return view('livewire.request-table',['requests' => $this->requests]);
    }
}
