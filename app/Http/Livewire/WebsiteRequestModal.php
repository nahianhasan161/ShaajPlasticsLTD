<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Livewire\Component;

class WebsiteRequestModal extends Component
{
    protected $listeners = ['showWebsiteModal'];

    public $request = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'note' => '',
    ];
    protected $rules = [
        'request.name' => 'required',
        'request.email' => 'required',
        'request.phone' => 'required|max:14',
        'request.note' => 'max:250',
    ];
    protected $validationAttributes = [
        'request.name' => 'Name',
        'request.email' => 'Email',
        'request.phone' => 'Phone',
        'request.note' => 'Details'
    ];
    public function showWebsiteModal()
    {
        $this->reset();
        $this->resetValidation();
    }
    public function createRequest()
    {
       $validatedData = $this->validate();

       Request::Create(array_merge($validatedData['request'],[
        'type' => 'contact'
       ]));
      /*  $this->reset(); */
       $this->emit('showWebsiteModal');
        $this->emit('alert',['icon' => 'success','title' => 'success']);
    }
    public function render()
    {
        return view('livewire.website-request-modal');
    }
}
