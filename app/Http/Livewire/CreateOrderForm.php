<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Order;
use App\Models\PlasticProduct;
use App\Models\Via;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateOrderForm extends Component
{

    public $selectedProduct ;
    public $maxQuantity;





    /* public $costType = ''; */
    public $partial = [
        [
            'pricePerPis' => 0,
            'totalPrice' => 0,
            'productionType' => '',
            'productionPriceTotal' => 0,
            /* 'productionPrice' => 0, */
        ]
    ];
    public $request = [




        'rate' => '',
        'note' => '',
        'company_id' => '',
        'via_id' => '',


    ];
    public $product = [
        ['costType' => '',
        'product_id' => '',
        'quantity' => '',
        'productionPrice' => '',
        'costingPrice' => '',]

    ];
    protected $rules = [


        'request.rate' => 'required|numeric|min:1',
        'request.note' => 'required',
        'request.company_id' => 'required',
        'request.via_id' => 'required',
        'request.type' => 'required',
        'product.0.costType' => 'required',
        'product.0.product_id' => 'required',

        'product.0.productionPrice' => '',
        'product.0.costingPrice' => 'required',



    ];

    /* private function validatePartial ()
    {
      $validatedData =   $this->validate([
        'partial.pricePerPis' => '',
        'partial.totalPrice' => '',
        'partial.productionType' => '',
        'partial.productionPriceTotal' => '',

        ]);
        return $validatedData['partial'];
    } */
    private function validateProduct ()
    {
        $this->selectedProduct = $this->products->find($this->product['0']['product_id']);
        if($this->selectedProduct ){
            $this->product['0']['productionPrice'] = $this->selectedProduct->price;
            $quantity = $this->selectedProduct->quantity ;
        }else{
            $quantity = 0;
        }
        /* dd($quantity); */
      $validatedData =   $this->validate([
        'product.0.costType' => 'required',
        'product.0.product_id' => 'required',
        'product.0.quantity' => 'required|numeric|max:'.$quantity,
        'product.0.productionPrice' => '',
        'product.0.costingPrice' => 'required',

        ]);
        return $validatedData['product'];
    }
    public function calculate()
    {

       $this->validateProduct();
       $this->CostingCalc();
       $this->productionCalc();
    }


    public function productionCalc()
    {
        /* $selectedProductQuantity = $this->selectedProduct ?  $this->selectedProduct->quantity : 0;
        $price =  $this->selectedProduct ? $this->selectedProduct->price     : 0;
        //! Production Price Calculation
        $this->partial['0']['productionPriceTotal'] = intval($price) * intval($this->product['0']['quantity'] ? $this->product['0']['quantity'] : 0) ;

        */
        $this->selectedProduct = $this->products->find($this->product['0']['product_id']);
        if($this->selectedProduct ){
            $this->product['0']['productionPrice'] = $this->selectedProduct->price;

            $this->partial['0']['productionPriceTotal'] = intval($this->selectedProduct->price) * intval($this->product['0']['quantity']) ;

        } else{

         $this->product['0']['productionPrice'] = 0;
         $this->partial['0']['productionPriceTotal'] = 0;
        }
    }
    private function CostingCalc()
    {
        if(intval($this->product['0']['quantity']) == 0 || intval($this->product['0']['quantity']) == 0 || intval($this->product['0']['costType']) == 0){

            $this->partial['0']['pricePerPis'] = 0;
            $this->partial['0']['totalPrice'] = 0;
        }else{
        $this->partial['0']['pricePerPis'] =  intval($this->product['0']['costingPrice']) / intval($this->product['0']['costType']) ;

        $this->partial['0']['totalPrice'] =  intval($this->product['0']['quantity']) * intval($this->partial['0']['pricePerPis']) ;
        }
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
        return $validatedData['product'];
    }


    public function createModalButton()
    {
       $this->emit('showModal');
    }
    public function createOrder()
    {
        $this->selectedProduct = $this->products->find($this->product['0']['product_id']);
        $quantity =$this->selectedProduct? $this->selectedProduct->quantity : 0;
        $this->rules +=[ 'product.0.quantity' => 'required|numeric|min:1|max:'.$quantity];
       $validatedData = $this->validate();
       /*  $validatedData = $this->validateRequest(); */

     /*   dd($validatedData['product'][0]['quantity']); */

  /*   $status = DB::transaction(function ($validatedData)  { */

         $order = Order::create(
             $validatedData['request']
            );
            $order->products()->create([
                'quantity' => $validatedData['product'][0]['quantity'],
                'productionPrice' => $validatedData['product'][0]['productionPrice'],
                'costingPrice' => $validatedData['product'][0]['costingPrice'],
                'product_id' => $validatedData['product'][0]['product_id'],

            ]);
       /*  }); */

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
