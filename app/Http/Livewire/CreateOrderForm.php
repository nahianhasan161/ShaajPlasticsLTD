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
    public $Model;
    public $Order;
    public $currency = 'taka';
    private $index = 0;
    public $total = 0;





    /* public $costType = ''; */
    public $partial = [
        [
            'pricePerPis' => 0,
            'totalPrice' => 0,
            'productionType' => '',
            'productionPriceTotal' => 0,
           'productionPrice' => 0,
        ]
    ];
    public $request = [




        'type' => '',
        'rate' => '',
        'note' => '',
        'company_id' => '',
        'via_id' => '',


    ];

    public $product = [
        ['costType' => "1",
        'product_id' => '',
        'quantity' => '',
        'productionPrice' => '',
        'costingPrice' => '',]

    ];
    public $newProduct;
    protected $rules = [



        'request.note' => 'max:300',
        'request.company_id' => 'required',
        'request.via_id' => 'required',
        'request.type' => 'required',
        'product.0.costType' => 'required',
        'product.0.product_id' => 'required',

        'product.0.productionPrice' => '',
        'product.0.costingPrice' => 'required',



    ];
//!Add Remove fields
    public function addProduct()
    {
        $this->product[] =   [
            'costType' => '',
        'product_id' => '',
        'quantity' => '',
        'productionPrice' => '',
        'costingPrice' => '',];

        $this->partial[] = [
            'pricePerPis' => 0,
            'totalPrice' => 0,
            'productionType' => '',
            'productionPriceTotal' => 0,
            'prouctionPrice' => 0,
        ];
    }
    public function removeProduct()
    {
        /* unset($this->deliveryProducts[$key]); */
        array_pop($this->product);
        array_pop($this->partial);
    }
    //!Updated  Input Properties

    public function updatedRequestType($type)
    {

        if($type == 'lc'){
            $this->currency = 'doller';

            /* $this->rules['request.rate'] = 'required|numeric|min:1'; */
        }else
        {
            $this->rules['request.rate'] = '';
            $this->currency = 'taka';
        }
    }
    public function updatedRequestRate()
    {
        /* dd($this->product); */
        /* $split = explode('.',$nestedItem);
        $index = $split['0']; */
        /* dd($nestedItem); */
        foreach($this->product as $index => $product){
            $validatedData = $this->validateProduct($index);
            $this->CostingCalc($index);
            $this->ProductionCalc($index);

        }


    }

    public function updatedPartial($value,$nestedItem)
    {
        $split = explode('.',$nestedItem);
        $index = $split['0'];
        if($this->product[$index]['costType']){
            $validatedData = $this->validateProduct($index);

        }

    }

    public function updatedProduct($value,$nestedItem)
    {
        /* dd($this->product); */
        $split = explode('.',$nestedItem);
        $index = $split['0'];
        /* dd($nestedItem); */
        $validatedData = $this->validateProduct($index);
        $this->CostingCalc($index);
        $this->ProductionCalc($index);


    }

//! Helpers
    private function validateProduct ($index)
    {
        $selectedProduct = $this->products->find($this->product[$index]['product_id']);

        if($selectedProduct){
            if($this->product[$index]['costType']){

                $this->product[$index]['productionPrice'] = $selectedProduct->price * $this->product[$index]['costType'];
            }
              $this->partial[$index]['productionPrice'] = convertToUSDHelper( (floatval($selectedProduct->price) * floatval($this->product[$index]['costType']) ), $this->request['rate'],$this->request['type'] );

            $quantity = $selectedProduct->quantity / ($this->product[$index]['costType'] ? $this->product[$index]['costType'] : 1 );
        }else{
            $quantity = 0;
        }
       $validatedData = $this->validate( [
            'product.'.$index.'.costType' => 'required',
            'product.'.$index.'.product_id' => 'required',
            'product.'.$index.'.quantity' => 'required|numeric|max:'.$quantity,
            'product.'.$index.'.productionPrice' => '',
            'product.'.$index.'.costingPrice' => 'required',

        ]);
        return $validatedData['product'];
    }




    public function productionCalc($index)
    {

        $this->selectedProduct = $this->products->find($this->product[$index]['product_id']);
        if($this->selectedProduct ){
            if($this->product[$index]['costType'])
            {

                 $this->product[$index]['productionPrice'] = $this->selectedProduct->price * floatval($this->product[$index]['costType']);
            }else{

                $this->product[$index]['productionPrice'] = $this->selectedProduct->price;
            }

            $this->partial[$index]['productionPriceTotal'] = convertToUSDHelper($this->selectedProduct->price * $this->product[$index]['quantity'],
             $this->request['rate'],$this->request['type']

            ) ;
               /*  (round($this->selectedProduct->price,2) * round($this->product[$index]['quantity'],2)); */


        } else{

         $this->product[$index]['productionPrice'] = 0;
         $this->partial[$index]['productionPriceTotal'] = 0;
        }
    }
    private function CostingCalc($index)
    {
        if(floatval($this->product[$index]['quantity']) == 0 || floatval($this->product[$index]['quantity']) == 0 || floatval($this->product[$index]['costType']) == 0){

            $this->partial[$index]['pricePerPis'] = 0;
            $this->partial[$index]['totalPrice'] = 0;
        }else{
        $this->partial[$index]['pricePerPis'] =  floatval($this->product[$index]['costingPrice']) / floatval($this->product[$index]['costType']) ;

        $this->partial[$index]['totalPrice'] =  floatval($this->product[$index]['quantity']) * floatval($this->partial[$index]['pricePerPis']) * floatval($this->product[$index]['costType']) ;
        }
    }




    protected function validateRequest ()
    {

      $validatedData =   $this->validate([
            'request.rate' => 'required',
            'request.note' => 'max:300',
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
        foreach($this->product as $p){
            $this->total = floatval($p['quantity']) * floatval($p['costingPrice']);
        }
        /* dd($this->total); */
        if($this->currency == 'doller'){
            $this->rules['request.rate'] = 'required|numeric|min:1';
        }
        /* dd($this->rules); */
        $validatedData = $this->validate();
        foreach($this->product as $index => $productItem){

            $this->validateProduct($index);
        }



        /* dd(); */
         $order = Order::create(
             array_merge(
             $validatedData['request'],
             ['payable' => $this->total]
         ));
            $order->products()->createMany(
                $this->product

            );
       /*  }); */

        $this->reset();
        /* $this->emit('showModal'); */
        $this->emit('alert',['icon' => 'success','title' => 'Order Has Been Created Successfully']);
        /* $this->emit('refreshOrderTable'); */
    }

    //!Get Properties
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
    public function mount()
    {
        if($this->Order){


            $this->request = $this->Order;
        foreach($this->Order->products as $product)
        {
            $this->partial[$this->index] = $product;
            $this->product[$this->index] = $product;
            $this->index++;
            if($this->index > 0){
                $this->addProduct();
            }
        }


        }

    }
    public function render()
    {

        $products = $this->products->pluck('code','id');
       $this->newProduct = $this->product;
        return view('livewire.create-order-form',['products' => $products,'companies' => $this->companies,'vias' => $this->vias]);
    }
}
