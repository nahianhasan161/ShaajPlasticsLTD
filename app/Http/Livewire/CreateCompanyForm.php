<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class CreateCompanyForm extends Component
{
    public $Model;
    public $request = [
        'name' => '',
        'phone' => '',
        'address' => ''
    ];
    protected $rules = [
        'request.name' => 'required',
        'request.phone' => 'required|min:11|max:14',
        'request.address' => 'required'
    ];
    public function createModalButton()
    {
        $this->resetExcept('Model');
        $this->emit('showModal');

    }
    public function createVia()
    {

        $validatedData = $this->validate();

        $this->Model::create($validatedData['request']);
        $this->reset();
        $this->emit('showModal');
        $this->emit('refresh');
        $this->emit('alert',['icon' => 'success','title' => 'Successfullty Created']);
    }
    public function mount()
    {
        $this->Model;
    }
    public function render()
    {
       /*  dd($this->Model); */
        return view('livewire.create-company-form');
    }
}
