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
    public function getOrdersProperty()
    {

        return Order::with('company','via','product')->paginate(2);
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
    public function render()
    {
        return view('livewire.order-table',['orders' => $this->orders]);
    }
}
