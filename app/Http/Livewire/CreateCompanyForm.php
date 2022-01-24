<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class CreateCompanyForm extends Component
{
    public $request = [
        'name' => '',
        'phone' => '',
        'address' => ''
    ];
    protected $rules = [
        'request.name' => 'required',
        'request.phone' => 'required|digits:11',
        'request.address' => 'required'
    ];
    public function createModalButton()
    {
        $this->reset();
        $this->emit('showModal');

    }
    public function createVia()
    {
        $validatedData = $this->validate();

        Company::create($validatedData['request']);
        $this->reset();
        $this->emit('showModal');
        $this->emit('alert',['icon' => 'success','title' => 'Successfullty Created']);
    }

    public function render()
    {
        return view('livewire.create-company-form');
    }
}
