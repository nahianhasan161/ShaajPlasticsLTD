<?php

namespace App\Http\Livewire;

use App\Models\PlasticProduct;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class PlasticProductTable extends Component
{

    protected $listeners = ['deleteConfirmed','refresh' => '$refresh' ];
    public $bigPhoto;

    public function isActive($id)
    {
        $product = $this->products->find($id);
        if( $product->active == 0){
            $product->update(['active' => 1]);
        }
        elseif($product->active  == 1){
            $product->update(['active' => 0]);

        }

        $this->emit('$refresh');
        $this->emit('alert',['icon' => 'success', 'title' =>'"'. $product->name .' status changed successfully to '. ($product->active == 1 ? 'Active' : 'Deactive') ]);
    }

    public function updateProduct($id)
    {
        $this->emit('showModal');
        $this->emit('updateModal',$id);
    }

    public function deleteConfirmed($id)
    {
        $product = PlasticProduct::where('id',$id)->first();

        if($product){

            if(File::exists($product->image)){
                File::delete($product->image);
                $this->emit('alert',['icon' => 'success', 'title' =>'"'. $product->name .'"Image got deleted successfully']);
            }

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' =>'"'. $product->name .'" got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' =>'"'. $product->name .'"  delete is Unsuccessfully']);
        }
    }


    public function showPhoto($photo)
    {
        $this->emit('showPhoto');
       $product = $this->products->find($photo);
       $product ? $this->bigPhoto = $product->image
       : $this->emit('alert',['icon' => 'error','title' => 'Product Image Not Found']);

    }
    public function getProductsProperty()
    {
        return PlasticProduct::with('category')->paginate(10);
    }
    public function render()
    {

        return view('livewire.plastic-product-table',['products' => $this->products]);
    }
}
