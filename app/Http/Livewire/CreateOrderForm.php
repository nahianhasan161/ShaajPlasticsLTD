<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Order;
use App\Models\PlasticProduct;
use App\Models\Via;
use Livewire\Component;

class CreateOrderForm extends Component
{
    public $productName = '';
    public $selectedProduct ;
    public $selectedQuantity = 0 ;
    public $productPrice = '0';
    public $productionPrice = '0';
    public $productionType = '';
    public $pricePerPis = '0';
    public $totalPrice = '0';
    public $costType = '';
    public $productQuantity = 0;
    public $request = [

        'price' => '0',
        'quantity' => '0',
        'type' => '',

        'rate' => '',
        'note' => '',
        'company_id' => '',
        'via_id' => '',
        'product_id' => '',
        'tracking_id' => '11'
    ];
    protected $rules = [
        'request.price' => 'required|numeric|min:1',
        'request.quantity' => 'required|numeric|min:1',
        'request.type' => 'required',
        'request.rate' => 'required|numeric|min:1',
        'request.note' => 'required',
        'request.company_id' => 'required',
         'request.product_id' => 'required',
        'request.via_id' => 'required',
        'request.tracking_id' => 'required'

    ];
     public function updatedProductName($name)
    {
        $product = $this->products->where('name',$name)->first();
        $this->selectedProduct = $product;
        $this->request['product_id'] =  $product->id ?? ' ';
        $quantity = $product ? $product->quantity : 0;

       $validatedData =  $this->validate([
            'request.company_id' => 'required',
        'request.quantity' => 'required|numeric|min:1|max:'.$quantity,
        ]);

        $this->productQuantity = $quantity;
        $this->productPrice = $product ? $product->price * $this->selectedQuantity : 0;
        /* $this->request['price'] = $price; */

    }
    public function updatedRequestQuantity($selectedQuantity)
    {

        $quantity = $this->selectedProduct ?  $this->selectedProduct->quantity : 0;
        $qnt = $selectedQuantity ? $selectedQuantity : 0 ;
        $price =  $this->selectedProduct ? $this->selectedProduct->price     : 0;
        $this->productPrice = $price * $qnt ;
        /* $this->productQuantity = $selectedQuantity; */
        $this->selectedQuantity =  $selectedQuantity;
        //dd($this->selectedProduct);
        $validatedData = $this->validate([
            'request.company_id' => 'required',
            'request.quantity' => 'required|numeric|min:1|max:'.$quantity,

        ]);


        /* $this->request['productPrice'] = $price; */


    }

    public function updatedCostType($pack)
    {

        $this->pricePerPis = $pack ? $this->request['price'] / $pack : '0' ;

        $this->totalPrice = $pack ? $this->selectedQuantity * $this->pricePerPis : '0';

    }
    public function updatedProductionType($pack)
    {
        $price = $this->selectedProduct ? $this->selectedProduct->price : 0;
        $this->productionPrice = $pack ? $price * $pack : '0';

    }


    public function createModalButton()
    {
       $this->emit('showModal');
    }
    public function createOrder()
    {

        $validatedData = $this->validate();
        Order::create($validatedData['request']);
        $this->reset();
        $this->emit('showModal');
        $this->emit('alert',['icon' => 'success','title' => 'Order Has Been Created Successfully']);
        $this->emit('refreshOrderTable');
    }
    public function getProductsProperty()
    {
        return PlasticProduct::all();
    }
    public function getCompaniesProperty()
    {
        return Company::all();
    }
    public function getViasProperty()
    {
        return Via::all();
    }
    public function render()
    {
        $products = $this->products->pluck('name');

        return view('livewire.create-order-form',['products' => $products,'companies' => $this->companies,'vias' => $this->vias]);
    }
}
