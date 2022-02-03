<?php

namespace App\Http\Livewire;

use App\Models\PlasticProduct;
use App\Models\Production as ModalProduction;
use App\Models\RowMetarial;

use Livewire\Component;

class Production extends Component
{
    public $quantity = 1;
    public $qnt = 1;
    public $request = [
        'productName' => '',
        'productQuantity' => '',

        'materialName' => '',
        'materialQuantity' => ''
    ];
   /*  protected $rules = [
        'request.productName' => 'required',
        'request.productQuantity' => 'required',

        'request.materialName' => 'required',

    ]; */

 /*    public function updatedRequestProductName($name)
    {
        $this->qnt = PlasticProduct::where('name',$name)->pluck('quantity')->first();

    } */
    public function updatedRequestMaterialName($name)
    {
        $this->quantity = RowMetarial::where('name',$name)->pluck('quantity')->first();
        $this->validate([
            'request.materialName' => 'required',
            'request.materialQuantity' => 'required|numeric|min:1|max:'.$this->quantity
            ]);
        //dd($material);
    }
    public function updatedRequestMaterialQuantity($name)
    {
      $validatedData =   $this->validate([
            'request.materialName' => 'required',
            'request.materialQuantity' => 'required|numeric|min:1|max:'.$this->quantity
            ]);

    }
    public function createProduction()
    {
        $this->addError('email', 'The email field is invalid.');
        $validatedData = $this->validate(
            ['request.productName' => 'required',
            'request.productQuantity' => 'required|numeric|min:1',
            'request.materialName' => 'required',
            'request.materialQuantity' => 'required|numeric|min:1|max:'.$this->quantity],

           /*  ['required' => 'The :attribute field is required'], */
        );

        $product = ModalProduction::create([
           'name' => $validatedData['request']['productName'],
            'quantity' =>  $validatedData['request']['productQuantity'],
        ]);
         PlasticProduct::where('name',$validatedData['request']['productName'])->first()
       ->increment('quantity',  $validatedData['request']['productQuantity'] );
        $product->rowMaterials()->create([
            'name' => $validatedData['request']['materialName'],
            'quantity' =>  $validatedData['request']['materialQuantity'],
        ]);
        RowMetarial::where('name',$validatedData['request']['materialName'])->first()->decrement('quantity',intval($validatedData['request']['materialQuantity']));
        $this->reset();
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
