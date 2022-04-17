<?php

namespace App\Http\Livewire;

use App\Models\PlasticProduct;
use App\Models\Production as ModalProduction;
use App\Models\RowMetarial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Production extends Component
{
    public $factory;
    public $quantity = 1;
    public $qnt = 1;
    public $finalProduct = [

        'productName' => '',
        'productQuantity' => '',

    ];
   public $rowProduct = [[
        'materialName' => '',
        'materialQuantity' => '',
        ]];
   /*  protected $rules = [
        'request.productName' => 'required',
        'request.productQuantity' => 'required',

        'request.materialName' => 'required',

    ]; */

 /*    public function updatedRequestProductName($name)
    {
        $this->qnt = PlasticProduct::where('name',$name)->pluck('quantity')->first();

    } */

    public function addProduct()
    {
        $this->rowProduct[] = [


            'materialName' => '',
            'materialQuantity' => ''
        ];
    }
    public function removeProduct()
    {
        array_pop($this->rowProduct);
    }
    public function updatedRowProductMaterialName($name)
    {
        $this->quantity = RowMetarial::where('name',$name)->pluck('quantity')->first();
        $this->validate([
            'rowProduct.*.materialName' => 'required',
            'rowProduct.*.materialQuantity' => 'required|numeric|min:1|max:100'/* .$this->quantity */
            ]);
        //dd($material);
    }
    public function updatedRowProductMaterialQuantity($name,$nestedItem)
    {
        /* dd($nestedItem); */
      $validatedData =   $this->validate([
            'request.materialName' => 'required',
            'request.materialQuantity' => 'required|numeric|min:1|max:'/* .$this->quantity */
            ]);

    }
    public function createProduction()
    {
        /* $this->addError('email', 'The email field is invalid.'); */
        $validatedData = $this->validate(
            ['finalProduct.productName' => 'required',
            'finalProduct.productQuantity' => 'required|numeric|min:1',
            'rowProduct.*.materialName' => 'required',
            'rowProduct.*.materialQuantity' => 'required|numeric|min:1|max:100'/* .$this->quantity */],

           /*  ['required' => 'The :attribute field is required'], */
        );

         //!final Product

        $product = ModalProduction::create([
           'name' => $validatedData['finalProduct']['productName'],
            'quantity' =>  $validatedData['finalProduct']['productQuantity'],
            'factory_id' =>  $this->factory->id,
        ]);
         PlasticProduct::where('name',$validatedData['finalProduct']['productName'])->first()
       ->increment('quantity',  $validatedData['finalProduct']['productQuantity'] );

       //!rowMaterial
       foreach($this->rowProduct as $index =>  $rowitem){
           $quantity = (floatval($validatedData['rowProduct'][$index]['materialQuantity'] / 1000) * floatval($validatedData['finalProduct']['productQuantity']));
        $product->rowMaterials()->create([
            'name' => $validatedData['rowProduct'][$index]['materialName'],
            'quantity' =>  $quantity,
            'factory_id' =>  $this->factory->id,
        ]);
        $rowMaterial = RowMetarial::where('name',$validatedData['rowProduct'][$index]['materialName'])->first();
        $rowMaterial->decrement('quantity',intval($validatedData['rowProduct'][$index]['materialQuantity']));
        $rowMaterial->histories()->create(
            [
                'name' => $rowMaterial->name,

              'quantity' => $validatedData['rowProduct'][$index]['materialQuantity'],
              'price' =>$rowMaterial->price,

              'date' =>    Carbon::now()->format('d/m/Y'),
              'type' => 'Used',
              'user_id' => Auth::user()->id
            ]
            );

       }


        $this->resetExcept('factory');
        $this->emit('alert',['icon' => 'success','title' => 'created']);
        /* $this->validate(['request.materialQuantity' => 'required|numeric|max:'.$this->q]); */
    }
    public function getRowMaterialsProperty()
    {
        return RowMetarial::pluck('name')->all();
    }
    public function getProductsProperty()
    {
        return PlasticProduct::pluck('name')->all();
    }
    public function render()
    {

        return view('livewire.production',['rowMaterials' => $this->RowMaterials,'products' => $this->Products]);
    }
}
