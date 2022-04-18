<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Order;
use Livewire\Component;

class CreateDeliveryForm extends Component
{
    public $selectedOrder ;
    public $deliveryProducts =[
        [
            'order_product_id' => '',
            'quantity' => '1',
        ],

    ];

    public function updatedDeliveryProducts($value,$nested)
    {
        $nestedData = explode(".", $nested);

       /*  dd($nestedData[0],$nestedData[1]); */
    }

    public function addProduct()
    {
        $this->deliveryProducts[] = ['name' => '', 'quantity' => '1'];
    }

    public $request = [
        'delivery_to_name' => '',
        'delivery_to_phone' => '',
        'delivery_to_address' => '',

        'delivery_by_name' => '',
        'delivery_by_phone' => '',
        'delivery_by_address' => '',

        'note'  => '',

        'status' => 'pending',


    ];
    protected $rules = [
        'request.delivery_to_name' => 'required',
        'request.delivery_to_phone' => 'required',
        'request.delivery_to_address' => 'required',

        'request.delivery_by_name' => 'required',
        'request.delivery_by_phone' => 'required',
        'request.delivery_by_address' => 'required',



        'request.order_id' => 'required',

        'request.note'  => 'max:250',

        'deliveryProducts.*.order_product_id' => 'required',
        'deliveryProducts.*.quantity' => 'required|numeric|min:2',
    ] ;
    protected function productValidate($index,$max)
    {
        $this->validate(
            ['deliveryProducts.'.$index.'.quantity' => 'numeric|min:1|max:'.$max]

          );
    }
    public function showModal()
    {
        $this->emit('showModal');
    }

    public function createDelivery()
    {
        /* $total = 0; */

        foreach($this->deliveryProducts as $product){
            $thisProduct = $this->selectedOrder->products->where('id',$product['order_product_id'])->first();

           /*  $total = $total + $thisProduct->costingPrice * $product['quantity']; */
        }

      $validatedData = $this->validate([
            'request.tracking_id' => '',
            'request.delivery_to_name' => 'required',
        'request.delivery_to_phone' => 'required',
        'request.delivery_to_address' => 'required',

        'request.delivery_by_name' => 'required',
        'request.delivery_by_phone' => 'required',
        'request.delivery_by_address' => 'required',



        'request.order_id' => 'required',
        'request.status' => 'required',
        'request.note'  => 'max:250',

        'deliveryProducts.*.order_product_id' => 'required',
        'deliveryProducts.*.quantity' => 'required|numeric|min:1',
        ]);


        /* $this->orders->first()->deliveries()->create($validatedData); */
        /* dd($validatedData['request']); */
        $total = 0;
        foreach($this->deliveryProducts as $index => $product){
            $orderProduct = $this->selectedOrder->products->find($product['order_product_id']);




          $this->productValidate($index,$orderProduct->quantity - $orderProduct->delivered);
             /*  dd($validatedData1); */
        }

       $createdDelivery =  $this->orders->where('id',$this->request['order_id'])->first()->deliveries()->create(array_merge($validatedData['request'])
    );
    $createdDelivery->products()->createMany($this->deliveryProducts );
        $this->reset();
        $this->emit('alert',['icon' => 'success','title' => 'Delivery Has Been Created Successfully']);
    }
    public function delete($key)
    {
        unset($this->deliveryProducts[$key]);
        array_values($this->deliveryProducts);
    }

    public function updatedRequestOrderId($id)
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
        $products = $this->selectedOrder ? $this->selectedOrder->products->pluck('details.code','id') : null;

        return view('livewire.create-delivery-form',['clients' => $this->clients,'orders' => $this->orders,'products' => $products]);
    }
}
