<?php

namespace App\Http\Livewire;

use App\Models\Via;
use Livewire\Component;
use Livewire\WithPagination;

class ViaTable extends Component
{
    use WithPagination;

    protected $paginationTheme= 'bootstrap';
    protected $listeners= ['refresh' => '$refresh','deleteConfirmed'];
    public function getViasProperty()
    {
        return Via::paginate();
    }
    public function deleteConfirmed($id)
    {
        $product = Via::where('id',$id)->first();
        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' => "'$product->name'" .' got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' => $product->name .'   delete is Unsuccessfully']);
        }
    }
    public function render()
    {
        return view('livewire.via-table',['vias' => $this->vias]);
    }
}
