<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Order;
use Livewire\Component;

class CreateBillForm extends Component
{
    public $selectedOrder ;

    public $bill = [
        'order_id' => '',
        'client_id' => '',
        'type' => '',


        'note'  => '',

        'status' => 'pending',

        'total' => 0,
        'due' => 0,
        'paid' => 0,


    ];
    protected $rules = [




        'bill.order_id' => 'required',
        'bill.client_id' => 'required',
        'bill.type' => 'required',

        'bill.note'  => 'max:250',

        'deliveryProducts.*.order_product_id' => 'required',
        'deliveryProducts.*.quantity' => 'numeric|min:1',
    ] ;

    public $partials =
        [
           [
            'unitType' => 'Pis',
            'priceByPis' => 0,
            'priceByType' => 0,
            'priceTotal' => 0,
           ]

        ];
    public $deliveryProducts =[
        [
            'order_product_id' => '',
            'quantity' => '1',
        ],

    ];

    public function updatedDeliveryProducts($value,$nested)
    {
        $nestedData = explode(".", $nested);
        $index = $nestedData[0];
        $propertyName = $nestedData[1];
        /* dd($value); */




            $selectedProduct = $this->selectedOrder ? $this->selectedOrder->products->find($this->deliveryProducts[$index]['order_product_id']) : null;

            /* @dump($selectedProduct); */

           /*  if( ($selectedProduct && ( $selectedProduct->costType && $selectedProduct->costType !== 0) )){ */
            $this->partials[$index]['unitType'] = $selectedProduct ? ($selectedProduct->costType == 0 ? null : $selectedProduct->costType) : null;
            $this->partials[$index]['priceByPis'] = $selectedProduct ? ($selectedProduct->costingPrice * $selectedProduct->costType) : 0;
            $this->partials[$index]['priceByType'] = $selectedProduct ?  $selectedProduct->costingPrice  : 0;
            $this->partials[$index]['priceTotal'] = $selectedProduct ?  $selectedProduct->costingPrice  * floatval($this->deliveryProducts[$index]['quantity']) : 0;
          /*   } */
            /* $this->deliveryProducts[$index][$propertyName] */


    }
    public function productValidate($index,$max)
    {
        $this->validate(
            ['deliveryProducts.'.$index.'.quantity' => 'numeric|min:1|max:'.$max]

          );
    }
    public function addProduct()
    {
        $this->deliveryProducts[] = [
            'order_product_id' => '',
            'quantity' => '1',
        ];
        $this->partials[] = [
            'unitType' => 'Pis',
            'priceByPis' => 0,
            'priceByType' => 0,
            'priceTotal' => 0,
           ];
    }



    public function showModal()
    {
        $this->emit('showModal');
    }

    public function createDelivery()
    {
      /*   $total = 0;
        $max = 10;
        foreach($this->deliveryProducts as $product){
            $thisProduct = $this->selectedOrder->products->where('id',$product['order_product_id'])->first();

            $total = $total + $thisProduct->costingPrice * $product['quantity'];
        } */

      /*   dd($this->deliveryProducts); */
      $validatedData = $this->validate();
      $total = 0;

      foreach($this->deliveryProducts as $index => $product){
          $price = $this->selectedOrder->products->find($product['order_product_id']);

          $total = $total + (intval($product['quantity']) * intval(($price ? $price->costingPrice : 0)));

        $this->productValidate($index,$price->quantity);
           /*  dd($validatedData1); */
      }

    $bill =  $this->selectedOrder->bills()->create(array_merge($validatedData['bill']
    ,[
        'total' => $total,
        'due' => $total,
    ])
    );

/* dd($validatedData); */
        /* $this->orders->first()->deliveries()->create($validatedData); */
        /* dd($validatedData['request']); */
       /* $createdDelivery =  $this->orders->where('id',$this->request['order_id'])->first()->deliveries()->create(array_merge($validatedData['request'],
        ['payable' => $total])
    ); */

    $bill->products()->createMany($this->deliveryProducts );
        $this->reset();
        $this->emit('alert',['icon' => 'success','title' => 'Delivery Has Been Created Successfully']);
    }
    public function delete($key)
    {
        unset($this->deliveryProducts[$key]);
        array_values($this->deliveryProducts);
    }

    public function updatedBillOrderId($id)
    {

          $this->selectedOrder =   Order::where('id',$id)->first();

    }
    public function getClientsProperty()
    {
        return Client::all();
    }
    public function getOrdersProperty()
    {
        return Order::where('status','active')->get();
    }

    public function render()
    {
       /*  dd($this->order); */
        return view('livewire.create-bill-form',['clients' => $this->clients,'orders' => $this->orders]);
    }
}
