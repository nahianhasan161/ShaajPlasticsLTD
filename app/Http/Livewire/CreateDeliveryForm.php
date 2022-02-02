<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateDeliveryForm extends Component
{
    public $deliveryProducts =[
        [
            'name' => '',
            'quantity' => '1',
        ],

    ];


    public function addProduct()
    {
        $this->deliveryProducts[] = ['name' => '', 'quantity' => '1'];
    }
    public $request = [
        'deliveryToName' => '',
        'deliveryToPhone' => '',

        'deliveryByName' => '',
        'deliveryByPhone' => '',

        'note'  => '',
        'tracking_id' => '1',
    ];
    protected $rules = [
        'request.deliveryToName' => '',
        'request.deliveryToPhone' => '',

        'request.deliveryByName' => '',
        'request.deliveryByPhone' => '',

        'request.note'  => '',
        'request.tracking_id' => '1',
    ] ;

    public function showModal()
    {
        $this->emit('showModal');
    }

    public function createDelivery()
    {

        $this->validate([
            'deliveryProducts.*.name' => 'required',
            'deliveryProducts.*.quantity' => 'required|min:2',
        ]);
    }
    public function delete($key)
    {
        unset($this->deliveryProducts[$key]);
        array_values($this->deliveryProducts);
    }
    public function render()
    {
        return view('livewire.create-delivery-form');
    }
}
