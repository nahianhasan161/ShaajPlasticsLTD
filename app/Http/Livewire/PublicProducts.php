<?php

namespace App\Http\Livewire;

use App\Models\PlasticProduct;
use App\Models\Request;
use GrahamCampbell\ResultType\Success;
use Livewire\Component;

class PublicProducts extends Component
{
   public $products;
   public $thisProduct;

   public $showCallModal;
   public $request = [
       'name' => '',
       'email' => '',
       'phone' => '',
       'type' => 'Price',
   ];
  protected $rules =  [
       'request.name' => 'required|max:20',
       'request.email' => 'required|email|max:30',
       'request.phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
       'request.type' => '',
   ];
   protected $validationAttributes =[
    'request.name' => 'Name',
    'request.email' => 'Email',
    'request.phone' => 'Phone',

   ];
   public function requestPrice()
   {

       $validatedData =  $this->validate();
       $data =  Request::create($validatedData['request']);
       $this->reset(['request','showCallModal']);
          $this->emit('showModal');
          $this->emit('alert',['icon' =>'success','title' => 'Your '.$validatedData['request']['type']. '  Request Has Been Send']);


    }
    public function requestCall()
    {
        /* dd($this->request); */
        $this->request['type'] = 'CallBack';
        $validatedData =  $this->validate();
      $data =  Request::create($validatedData['request']);
        $this->reset(['request','showCallModal']);
        $this->emit('showModal');
        $this->emit('alert',['icon' =>'success','title' => 'Your '.$validatedData['request']['type']. '  Request Has Been Send']);
   }
   public function showPriceForm($id)
   {
       $this->showCallModal = false;
    $this->reset(['request','showCallModal']);
    $this->resetValidation();
    if($id){

        $this->thisProduct = $this->products->find($id);
    }
    $this->emit('showModal');
}
public function showCallbackForm($id)
{
    $this->reset(['request','showCallModal']);
    $this->showCallModal = true;
    $this->resetValidation();

        if($id){

            $this->thisProduct = $this->products->find($id);
        }

       $this->emit('showModal');

   }
    public function render()
    {
        return view('livewire.public-products',['products' => $this->products]);
    }
}
