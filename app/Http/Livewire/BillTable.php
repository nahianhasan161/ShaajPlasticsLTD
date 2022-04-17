<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\AccountTransection;
use App\Models\Bill;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;


class BillTable extends Component
{
    public $order;


    use WithPagination;


    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshOrderTable' => '$refresh','deleteConfirmed'];

    public $paymentType ;
    public $selectedBill ;
    public $Order ;
    public $date ;
    public $account = [
        'amount' => 0,
        'type' => 'debit',

        'note' => '',
        'reason' => 'Debited Your Account From Bill',


    ];

    /* public function getOrdersProperty()
    {

        return Order::with('company','products','deliveries')->paginate(2);
    } */
    public function getOrderProperty()
    {

        return Order::with('deliveries','company','product','products','via')->where('id',$this->Order->id)->first();
    }
    public function getBillsProperty()
    {

        return $this->order->bills()->paginate();
    }
    public function deleteConfirmed($id)
    {
        $product = Bill::where('id',$id)->first();
        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' =>'The Bill got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' => 'The Bill   delete is Unsuccessfully']);
        }
    }
public function payment($bill)
{
    $this->selectedBill = Bill::find($bill);
    $this->emit('showModal');
    $this->resetExcept('selectedBill','order');
}
public function addMoney()
{
    /* dd($this->order->type); */

    $max = $this->selectedBill->total - $this->selectedBill->paid;
    /* dd($this->paymentType); */
    if($this->paymentType == 'credit'){
        $max = $this->selectedBill->paid;
       /*  dd($max); */
    }

        $validatedData = $this->validate([
            'paymentType' => 'required',
            'account.amount' => 'required|numeric|min:1|max:'.$max,
            'account.type' => 'required',
            'account.reason' => 'required',
            'account.note' => 'max:250',

            'date' => 'required|date_format:d/m/Y',
        ]);
        if( $max > 0){
            if($this->paymentType == 'debit'){

        $this->debitToAccount( );
    }
    if($this->paymentType == 'credit'){

            $this->creditFormAccount( );
        }
        $this->emit('alert',['icon' => 'success', 'title' =>'The Bill Amount Added successfully']);
    }else{

        $this->emit('alert',['icon' => 'error', 'title' => 'The Bill   is not Paid successfully']);
    }
    ($this->selectedBill->paid == $this->selectedBill->total) ? $this->selectedBill->update(['status' =>'paid']) : $this->selectedBill->update(['status' =>'notpaid']) ;

    $this->emit('showModal');



    /* dd($validatedData); */
}

    protected function debitToAccount(){

        $this->selectedBill->increment('paid',$this->account['amount']);
        $this->selectedBill->Order->increment('paid',$this->account['amount']);
        Account::first()->increment('debit',$this->account['amount']);

        $date = Carbon::createFromFormat('d/m/Y', $this->date)->format('Y/m/d');
        if($this->order->type = 'lc'){
         $this->account['amount'] =   $this->order->rate * $this->account['amount'];
        }
        AccountTransection::create(
            array_merge(
                $this->account,[
                    'date' => $date,
                    'reason' => 'Debited your account From Bill ['. $this->selectedBill->transection_id .' ] By '.Auth()->user()->name,
                ]
            )



        );
        $this->resetExcept('selectedBill','order');
    }
    protected function creditFormAccount(){
        /* dd($this->account['amount']); */
        Account::first()->increment('credit',$this->account['amount']);
        $this->selectedBill->decrement('paid',$this->account['amount']);
        $this->selectedBill->Order->decrement('paid',$this->account['amount']);

        $date = Carbon::createFromFormat('d/m/Y', $this->date)->format('Y/m/d');
        if($this->order->type == 'lc'){
            $this->account['amount'] =   $this->order->rate * $this->account['amount'];
        }

        AccountTransection::create(
            array_merge(
                $this->account,[
                    'date' => $date,
                    'type' => 'credit',
                    'reason' => 'Credited your account From Bill ['. $this->selectedBill->transection_id .' ] By '.Auth()->user()->name,
                ]
            )



        );
        $this->resetExcept('selectedBill','order');
    }

    public function render()
    {
      /*   dd($this->bills); */
        return view('livewire.bill-table',['order' => $this->order,'bills' => $this->bills]);
    }
}
