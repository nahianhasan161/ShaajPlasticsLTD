<?php

namespace App\Http\Livewire;

use App\Models\RowMetarial;
use Livewire\Component;

class Modal extends Component
{
    protected $listeners = ['editRowMetarial'];
    public $showEditModal = false;
    public $meterialId = '';
    public $Modal = 'App\\Models\\RowMetarial';
    public $request = [

        'name' => '',
        'quantity' => '',
        'price' => ''
    ];

    protected $rules = [

        'request.name' => 'required',
        'request.quantity' => 'required|numeric',
        'request.price' => 'required|numeric',
    ];
    public function createModalButton()
    {
        $this->reset();
        $this->emit('showModal');
    }
    public function createRowMetarial()
    {

       // dd($this->Modal::all());
       $validatedData = $this->validate();
        $this->Modal::updateorCreate($validatedData['request']);
        $this->emit('alert',['icon' => 'success','title' => 'Row Metarial Successfully Created' ]);
        $this->reset();
        $this->emit('showModal');
        $this->emit('refreshRowMeterial');

    }

    public function editRowMetarial(RowMetarial $rowMetarial)
    {
        $this->request = $rowMetarial;
        $this->meterialId = $rowMetarial->id;
        $this->showEditModal = true;
    }
    public function updateRowMetarial()
    {
        $item = $this->Modal::where('name',$this->request['name'])->first();
        $validatedData = $this->validate();
       /*  RowMetarial::updateorCreate(array_merge(['id' => $this->meterialId],$validatedData['request'])); */
         $item->Update($validatedData['request']);
        $this->emit('alert',['icon' => 'success','title' => 'Row Metarial Successfully Updated' ]);
        $this->emit('refreshRowMeterial');
        $this->reset();
        $this->emit('showModal');


    }
    public function render()
    {
        return view('livewire.modal');
    }
}
