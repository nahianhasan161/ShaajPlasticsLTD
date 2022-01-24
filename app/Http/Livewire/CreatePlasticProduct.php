<?php

namespace App\Http\Livewire;

use App\Models\PlasticProduct;
use GrahamCampbell\ResultType\Success;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePlasticProduct extends Component
{
    use WithFileUploads;

   /*  public $photo; */
    public $showEditModal = false;
    public $request = [
        'name' => '',
        'quantity' => '',
        'meterial' => '',
        'code' => '',
        'color' => '',
        'thickness' => '',
        'weight' => '',
        'packaging' => '',
        'stripes' => '',
        'price' => '',
        /* 'photo' => '' */
    ];
    protected $rules = [
        'request.name' => 'required',
        'request.quantity' => 'required|numeric|min:1',
        'request.meterial' => 'required',
        'request.code' => 'required',
        'request.color' => 'required',
        'request.thickness' => 'required|numeric|min:1',
        'request.weight' => 'required|numeric|min:1',
        'request.packaging' => 'required',
        'request.stripes' => 'required|numeric|min:1',
        'request.price' => 'required|numeric|min:1',
        /* 'request.photo' => '', */
       /*  'request.photo' => 'required|image|max:1024', // 1MB Max */
    ];
    public function createModalButton()
    {
        $this->emit('showModal');
    }

    public function createProduct()
    {

     /*    $this->request['photo'] = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyXvzJib8clmr-0OhQgf-bd4CAyj_NUdWj3A&usqp=CAU'; */
        $this->validate();
        //dd($this->request);
        PlasticProduct::create($this->request);
        $this->emit('alert',['icon' => 'success' ,'title' => 'Product Has been Created']);
    }
    public function render()
    {
        return view('livewire.create-plastic-product');
    }
}
