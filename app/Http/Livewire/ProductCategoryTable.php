<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategoryTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed','refresh' => '$refresh' ];
    public $bigPhoto;
    public $tempImage = 'https://i.ibb.co/rskNr5J/bottomH.jpg';

    public function updateProduct($id)
    {
        $this->emit('showModal');
        $this->emit('updateModal',$id);
    }
    public function deleteConfirmed($id)
    {
        $product = Category::where('id',$id)->first();

        if($product){
            if(File::exists($product->image)){
                File::delete($product->image);

            }

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' =>'"'. $product->name .'" got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' =>'"'. $product->name .'"  delete is Unsuccessfully']);
        }
    }
    public function showPhoto($photo)
    {
           $photo = $this->categories->find($photo);
        if($photo){
            $this->emit('showPhoto');
            $this->bigPhoto = $photo->image;

        }else{
            $this->emit('alert',['icon'=>'error','title'=>'something went wrong']);
        }
    }

    public function getCategoriesProperty()
    {
        return Category::paginate(5);
    }
    public function render()
    {
        return view('livewire.product-category-table',['categories' => $this->categories]);
    }
}
