<?php

namespace App\Http\Livewire;

use App\Models\Delivery;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
class DeliveryTable extends Component
{

    use WithPagination;


    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshOrderTable' => '$refresh','deleteConfirmed'];

    public $selectedDelivery ;
    public $Order ;
    public $date ;
    public $account = [
        'status' => '',
        'type' => 'debit',

        'note' => '',



    ];

    /* public function getOrdersProperty()
    {

        return Order::with('company','products','deliveries')->paginate(2);
    } */
    public function getOrderProperty()
    {

        return Order::with('deliveries','company','product','products','via')->where('id',$this->Order->id)->first();
    }
    public function getDeliveriesProperty()
    {

        return $this->order->deliveries()->paginate();
    }
    public function deleteConfirmed($id)
    {
        $product = Delivery::where('id',$id)->first();
        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' =>'The Order got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' => 'The Order   delete is Unsuccessfully']);
        }
    }
public function payment($delivery)
{
    $this->selectedDelivery = Delivery::find($delivery);
    $this->emit('showModal');
}
public function addMoney()
{
   $validatedData = $this->validate([
        'account.status' => 'required',
        'account.type' => 'required',

        'account.note' => 'max:250',

        'date' => 'required|date_format:d/m/Y',
    ]);

    if($this->selectedDelivery->status !== "delivered" && $validatedData['account']['status'] == "delivered"){
        foreach($this->selectedDelivery->products as $Dproduct){
            $Dproduct->orderProduct->quantity >= ($Dproduct->orderProduct->delivered )  ?   $Dproduct->orderProduct->increment('delivered',$Dproduct->quantity)  : null;
        }

    }
    if($this->selectedDelivery->status == "delivered" && $validatedData['account']['status'] !== "delivered"){
        foreach($this->selectedDelivery->products as $Dproduct){
            ($Dproduct->orderProduct->delivered > 0) ?  $Dproduct->orderProduct->decrement('delivered',$Dproduct->quantity)  : null;
        }

    }
    $this->selectedDelivery->update(['status' => $validatedData['account']['status']]);
    $this->emit('alert',['icon' => 'success', 'title' =>'The Delivery successfully changed to '. $validatedData['account']['status']]);
     $this->emit('showModal');

   /*  $this->selectedDelivery->order->increment('quantity',);
    $this->selectedDelivery->Order->increment('paid',$validatedData['account']['amount']); */
    /* dd($validatedData); */
}
    public function render()
    {
        /* dd($this->deliveries); */
        return view('livewire.delivery-table',['order' => $this->order,'deliveries' => $this->deliveries]);
    }
}
