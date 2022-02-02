<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Order;
use App\Models\PlasticProduct;
use App\Models\Via;
use Livewire\Component;

class CreateOrderForm extends Component
{

    public $selectedProduct ;

    public $productionPriceTotal = '0';
    public $productionPrice = '0';
    public $productionType = '';
    public $pricePerPis = '0';
    public $totalPrice = '0';
    public $costType = '';

    public $request = [




        'rate' => '',
        'note' => '',
        'company_id' => '',
        'via_id' => '',


    ];
    public $product = [
        'product_id' => '',
        'quantity' => '',
        'productionPrice' => '',
        'costingPrice' => '',

    ];
    protected $rules = [
        /* 'product.product_id' => 'required',
        'product.quantity' => 'required|numeric|min:1',
        'product.costingPrice' => 'required|numeric|min:1',
        'productionPrice' => 'required', */

        'request.rate' => 'required|numeric|min:1',
        'request.note' => 'required',
        'request.company_id' => 'required',
        'request.via_id' => 'required',


    ];
     public function updatedProductProductId($id)
    {

       $this->selectedProduct = $this->products->find($id);

       if($this->selectedProduct ){
           $this->product['productionPrice'] = $this->selectedProduct->price;
           $quantity = $this->selectedProduct->quantity ;
           $this->productionPriceTotal = intval($this->selectedProduct->price) * intval($this->product['quantity']) ;

       } else{
        $quantity = 0;
        $this->product['productionPrice'] = 0;
        $this->productionPriceTotal = 0;
       }


       $validatedData =  $this->validate([
            'request.product_id' => 'required',
        'request.quantity' => 'required|numeric|min:1|max:'.$quantity,
        ]);


        $this->productionPriceTotal = $this->selectedProduct ? intval($this->selectedProduct->price) * intval($this->product['quantity']) : 0;


    }
    public function updatedProductQuantity($inputQuantity)
    {

        $selectedProductQuantity = $this->selectedProduct ?  $this->selectedProduct->quantity : 0;
        $price =  $this->selectedProduct ? $this->selectedProduct->price     : 0;
        //! Production Price Calculation
        $this->productionPriceTotal = intval($price) * intval($inputQuantity ? $inputQuantity : 0) ;



        //!End Production Price Calculation
        //!Costing Price Calculation
         $this->CostingCalc();
        //!End Costing Price Calculation
        $validatedData = $this->validate([
            'request.company_id' => 'required',
            'request.quantity' => 'required|numeric|min:1|max:'.$selectedProductQuantity,

        ]);





    }
    private function CostingCalc()
    {
        if(intval($this->product['quantity']) == 0 || intval($this->product['quantity']) == 0 || intval($this->costType) == 0){

            $this->pricePerPis = 0;
            $this->totalPrice = 0;
        }else{
        $this->pricePerPis =  intval($this->product['costingPrice']) / intval($this->costType) ;

        $this->totalPrice =  intval($this->product['quantity']) * intval($this->pricePerPis) ;
        }
    }
    public function updatedCostType()
    {
        $this->CostingCalc();
    }
    public function updatedProductCostingPrice()
    {
        $this->CostingCalc();

    }

    public function updatedProductionType($pack)
    {
        $price = $this->selectedProduct ? $this->selectedProduct->price : 0;
        $this->product['productionPrice'] = $pack ? intval($price) * intval($pack) : '0';

    }

    private function validateRequest ()
    {
      $validatedData =   $this->validate([
            'request.rate' => 'required',
            'request.note' => 'required',
            'request.type' => 'required',

            'request.company_id' => 'required',
            'request.via_id' => 'required',
        ]);
        return $validatedData['request'];
    }

    public function createModalButton()
    {
       $this->emit('showModal');
    }
    public function createOrder()
    {

        $validatedData = $this->validateRequest();
        /* dd($validatedData); */
        Order::create(
            $this->request
        );
        /* dd($this->request); */
        $this->reset();
        /* $this->emit('showModal'); */
        $this->emit('alert',['icon' => 'success','title' => 'Order Has Been Created Successfully']);
        /* $this->emit('refreshOrderTable'); */
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
        $products = $this->products->pluck('name','id');

        return view('livewire.create-order-form',['products' => $products,'companies' => $this->companies,'vias' => $this->vias]);
    }
}
