<?php

namespace App\Http\Livewire;

use App\Models\InventoryProducts;

use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

class InventoryProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     protected $listeners = ['deleteConfirmed'];

    public $productName;


    public $productNameForCode;
    public $productCode;
    public $allProducts;

    public $model;
    protected $rules = [
        'productName' => 'required',
        'productNameForCode' => 'required',
        'productCode' => 'required',
    ];
    public function deleteConfirmed(  $id)
    {

       $product = $this->model::where('id',$id)->first();
       if($product){
           $product->delete() ;

           $this->emit('alert',['icon' => 'success','title' => '"'. $product->name.'" is successfully deleted']);
        }else{
            $this->emit('alert',['icon' => 'error','title' => ' Delete is Unsuccessfull']);
       }
    }
    public function createProduct()
    {
        $validatedData = $this->validateOnly('productName');

     $this->model::create([
          'name' =>$validatedData['productName']
      ]);

      $this->emit('alert',['icon' => 'success','title' => 'Product Successfully Created' ]);
      $this->reset('productName');


    }
    public function createProductCode()
    {
        $validatedData =  $this->validate(['productNameForCode' => 'required','productCode' => 'required']);
        $this->emit('alert',['icon' => 'success','title' => 'Product Code Successfully Created' ]);
        $product = $this->model::whereNull('parent_id')->where('name',$validatedData['productNameForCode'])->first();
        //dd($product);
        //dd($product->product_code());
        $product->product_code()->create([
            'name' => $validatedData['productCode']
        ]);
      $this->reset('productNameForCode','productCode');
    }

    //computed Property

    public function getProductsProperty()
    {
        return $this->model::query()->whereNull('parent_id')->paginate();
    }
    public function render()
    {
        $this->allProducts = $this->model::whereNull('parent_id')->get();
        $products = $this->products;

        return view('livewire.inventory-product',['products' => $products]);
    }
}
