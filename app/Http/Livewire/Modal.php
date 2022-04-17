<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\AccountTransection;
use App\Models\RowMetarial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Modal extends Component
{
    protected $listeners = ['editRowMetarial','addMaterial',];

    public $factory ;

    public $date ;


    public $showEditModal = false;
    public $addMaterial = false;
    public $meterialId = '';
    public $Product;


    public $Modal = 'App\\Models\\RowMetarial';
    public $request = [

        'name' => '',
        'quantity' => '',
        'price' => ''
    ];
    public $account = [
        'amount' => 0,
        'type' => 'debit',

        'note' => '',
        'reason' => 'Credited Your Account From Row Metarials',


    ];

    protected $rules = [

        'request.name' => 'required',
        'request.quantity' => 'required|numeric',
        'request.price' => 'required|numeric',
    ];
     //!Creating Row MAterial
    public function createModalButton()
    {
        $this->resetExcept('factory');
        $this->emit('showModal');
    }
    public function createRowMetarial()
    {





      $validatedData = $this->validate([
        'request.name' => 'required',
      ]);


      /* $validatedData['request']['price'] = $validatedData['request']['price']*$validatedData['request']['quantity']; */
      try{


      DB::transaction(function() use ($validatedData){
        $product =  $this->factory->rowmeterials()->create($validatedData['request']);
     $product->histories()->create([
        'name' => $product->name,
        'quantity' => 0,
        'price'    => 0,
        'date' =>    Carbon::now()->format('d/m/Y'),
        'type' => 'created',
        'user_id' => Auth::user()->id
    ]);
});

$this->emit('alert',['icon' => 'success','title' => 'Row Metarial Successfully Created' ]);
$this->resetExcept('factory');
$this->emit('showModal');
$this->emit('refreshRowMeterial');

}
catch( \Throwable $e){

    $this->emit('alert',['icon' => 'error','title' => "something went Wrong" ]);
    $this->resetExcept('factory');
    $this->emit('showModal');
    $this->emit('refreshRowMeterial');
}



    }

    public function editRowMetarial(RowMetarial $rowMetarial)
    {
        $this->resetExcept('factory');
        $this->showEditModal = true;
        $this->request = $rowMetarial;
        $this->request['price'] = priceHelper($rowMetarial->price,$rowMetarial->quantity);
       /*  number_format($rowMetarial->price/$rowMetarial->quantity, 2); */

        $this->meterialId = $rowMetarial->id;
    }
     //!End Creating Row MAterial
    //!ADDING Quantity
    public function addMaterial(RowMetarial $rowMetarial)
    {

        $this->resetExcept('factory');
        $this->emit('showModal');
        $this->Product = $rowMetarial;

        $this->meterialId = $rowMetarial->id;
        $this->addMaterial = true;

    }
    public function addQuantity()
    {
        $validatedData =   $this->validate([
            'request.quantity' => 'required|numeric|min:1',
            'request.price' => 'required|numeric|min:1',
            'date' => 'required|date_format:d/m/Y'
        ]);
        $this->Product->histories()->create([
            'name' => $this->Product->name,
            'quantity' => $validatedData['request']['quantity'],
            'price'    =>$validatedData['request']['price'],
            'date' =>    $validatedData['date'],
            'user_id' => Auth::user()->id
        ]);
        $this->Product->increment('quantity',BagToKgHelper($validatedData['request']['quantity']));
        $price = totalPriceHelper(kgToBagHelper($validatedData['request']['price']) , BagToKgHelper($validatedData['request']['quantity'])); //val1=price ,val2 = qnt by kg
        $this->Product->increment('price',$price);

        $this->creditFormAccount($price);

        $this->resetExcept('factory');

        $this->emit('refreshRowMeterial');
        $this->emit('showModal');
        $this->emit('alert',['icon' => 'success','title' => 'Row Metarial Quantity Successfully Added' ]);

    }
    //!End ADDING Quantity

    protected function creditFormAccount($price)
    {
        $this->account['amount'] = $price;
        Account::first()->increment('credit',$this->account['amount']);



        $date = Carbon::createFromFormat('d/m/Y', $this->date)->format('Y/m/d');

        AccountTransection::create(
            array_merge(
                $this->account,[
                    'date' => $date,
                    'type' => 'credit',
                    'reason' => 'Creadited your Account From Row Meterials: '.$this->Product->name .' By '.Auth()->user()->name
                ]
            )



        );

    }

    //!Updating Row MAterial
    public function updateRowMetarial()
    {
        $item = $this->Modal::where('id',$this->meterialId)->first();

        $validatedData = $this->validate();
        $validatedData['request']['price'] =  $validatedData['request']['price'] * $validatedData['request']['quantity'];
/* dd($validatedData['request']['price'] ); */
         try{


            DB::transaction(function() use ($validatedData,$item){
                 $oldQuantity = $item->quantity;
                $oldPrice = priceHelper($item->price,$item->quantity);
                 $item->Update($validatedData['request']);

           $item->histories()->create([
              'name' => $item->name,
              'oldQuantity' => $oldQuantity,
              'oldPrice' => $oldPrice,
              'quantity' =>$validatedData['request']['quantity'],
              'price' => priceHelper( $validatedData['request']['price'] , $validatedData['request']['quantity']),

              'date' =>    Carbon::now()->format('d/m/Y'),
              'type' => 'updated',
              'user_id' => Auth::user()->id
          ]);
      });

      $this->emit('alert',['icon' => 'success','title' => 'Row Metarial Successfully Updated' ]);
      $this->emit('refreshRowMeterial');
      $this->resetExcept('factory');
      $this->emit('showModal');

      }
      catch( \Throwable $e){

            $this->emit('alert',['icon' => 'error','title' => "something went Wrong" ]);
            $this->emit('refreshRowMeterial');
            $this->resetExcept('factory');
            $this->emit('showModal');
     }







    }



//!End Updating Row MAterial
    public function render()
    {

        return view('livewire.modal');
    }
}
