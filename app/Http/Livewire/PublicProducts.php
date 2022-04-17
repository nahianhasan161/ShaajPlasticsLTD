<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\PlasticProduct;
use App\Models\Request;
use GrahamCampbell\ResultType\Success;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class PublicProducts extends Component
{
   public $searchTerm = '';
   public $products;
   public $categoryName;
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
       'request.phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:14',
       'request.type' => '',
       'request.note' => 'Max:200',
   ];
   protected $validationAttributes =[
    'request.name' => 'Name',
    'request.email' => 'Email',
    'request.phone' => 'Phone',
    'request.note' => 'Details',

   ];

   public function searchProduct()
   {
    $searchTerm = $this->searchTerm;
    if($searchTerm){
        return redirect()->to('/products/search/'.$searchTerm);
    }

   }
   public function requestPrice()
   {
       /* dd(); */



       $dayLimit = RateLimiter::attempt(
        'send-message',
        $perDay = 299,
        function() {
            $ip = request()->ip();
            $ipLimit = RateLimiter::attempt(
                'send-message:'.$ip,
                $perMinute = 5,
                function() {

               $validatedData =  $this->validate();
               $data =  Request::create($validatedData['request']);
               $this->reset(['request','showCallModal']);
                  $this->emit('showModal');
                  $this->emit('alert',['icon' =>'success','title' => 'Your '.$validatedData['request']['type']. '  Request Has Been Send']);
                }
            );

            if (! $ipLimit) {
                $this->emit('alert',['icon' =>'error','title' => 'Wait a Minute.. Too many messages sent !']);

            }
         }
    );

    if (! $dayLimit) {
        $this->emit('alert',['icon' =>'error','title' => 'Daily messages Limit Has Been Reached ']);

    }






    }
    public function requestCall()
    {
        /* dd($this->thisProduct); */

       $dayLimit = RateLimiter::attempt(
        'send-message',
        $perDay = 299,
        function() {
            $ip = request()->ip();
            $ipLimit = RateLimiter::attempt(
                'send-message:'.$ip,
                $perMinute = 5,
                function() {

        $this->request['type'] = 'CallBack';
        $validatedData =  $this->validate();
      $data =  Request::create($validatedData['request']);
      Mail::to(masterEmailHelper())->send(new OrderMail($data->id,$this->thisProduct->id));


        $this->reset(['request','showCallModal']);
        $this->emit('showModal');
        $this->emit('alert',['icon' =>'success','title' => 'Your '.$validatedData['request']['type']. '  Request Has Been Send']);
    }
);

if (! $ipLimit) {
    $this->emit('alert',['icon' =>'error','title' => 'Wait a Minute.. Too many messages sent !']);

}
}
);

if (! $dayLimit) {
$this->emit('alert',['icon' =>'error','title' => 'Daily messages Limit Has Been Reached ']);

}
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

   public function getCategoriesProperty()
   {
       return Category::withCount('products')->get();
   }
    public function render()
    {
        return view('livewire.public-products',['products' => $this->products, 'categories' => $this->categories ]);
    }
}
