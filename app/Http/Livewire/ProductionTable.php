<?php

namespace App\Http\Livewire;

use App\Models\Production;
use Livewire\Component;
use Livewire\WithPagination;

class ProductionTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed','refresh' => '$refresh' ];


    public function updateProduct($id)
    {
        $this->emit('showModal');
        $this->emit('updateModal',$id);
    }
    public function deleteConfirmed($id)
    {
        $product = Production::where('id',$id)->first();

        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' =>'"'. $product->name .'" got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' =>'"'. $product->name .'"  delete is Unsuccessfully']);
        }
    }


    public function getCategoriesProperty()
    {
        return Production::whereNull('parent_id')->with('rowMaterials')->paginate(5);
    }
    public function render()
    {
        return view('livewire.production-table',['categories'=>$this->categories]);
    }
}
