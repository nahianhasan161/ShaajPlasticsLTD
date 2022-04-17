<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshOrderTable' => '$refresh','deleteConfirmed'];

    public $selectedOrder ;
    public $date ;
    public $account = [
        'amount' => 0,
        'type' => 'debit',

        'note' => '',
        'reason' => 'Debited Your Account From Order',


    ];
    public function getOrdersProperty()
    {

        return Order::with('company','products')->paginate(10);
    }
    public function deleteConfirmed($id)
    {
        $product = Order::where('id',$id)->first();
        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' =>'The Order got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' => 'The Order   delete is Unsuccessfully']);
        }
    }
    public function payment($orderId)
    {
        $this->selectedOrder = Order::find($orderId);

        $this->emit('showModal');

    }
    public function addMoney()
    {
       $validatedData = $this->validate([
            'account.amount' => 'required|numeric|min:1',
            'account.type' => 'required',
            'account.reason' => 'required',
            'account.note' => 'max:250',

            'date' => 'required|date_format:d/m/Y',
        ]);
        $this->selectedOrder->increment('paid',$validatedData['account']['amount']);

        dd($validatedData);
    }
    public function render()
    {
        return view('livewire.order-table',['orders' => $this->orders]);
    }
}
