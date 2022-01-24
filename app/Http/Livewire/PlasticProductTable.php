<?php

namespace App\Http\Livewire;

use App\Models\PlasticProduct;
use Livewire\Component;

class PlasticProductTable extends Component
{

    protected $listeners = ['deleteConfirmed' ];
    public $bigPhoto;

    public function deleteConfirmed($id)
    {
        $product = PlasticProduct::where('id',$id)->first();
        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' =>'"'. $product->name .'" got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' =>'"'. $product->name .'"  delete is Unsuccessfully']);
        }
    }
    public function showPhoto($photo)
    {
        $this->emit('showPhoto');
        $this->bigPhoto = $photo;
    }
    public function getProductsProperty()
    {
        return PlasticProduct::paginate();
    }
    public function render()
    {
        $products = $this->products;
        return view('livewire.plastic-product-table',['products' => $products]);
    }
}
