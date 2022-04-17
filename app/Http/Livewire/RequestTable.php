<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Livewire\Component;

class RequestTable extends Component
{
    protected $listeners= ['refresh' => '$refresh','deleteConfirmed'];
    public function getRequestsProperty(){
        return Request::paginate();
    }
    public function deleteConfirmed($id)
    {
        $product = Request::where('id',$id)->first();
        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' => "'$product->name'" .' got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' => $product->name .'   delete is Unsuccessfully']);
        }
    }
    public function render()
    {
        return view('livewire.request-table',['requests' => $this->requests]);
    }
}
