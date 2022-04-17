<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Factory;
use Livewire\Component;

class CreateFactory extends Component
{
    protected $listeners = ['updateModal','deleteConfirmed'];
     public $name;
     public $showEditModal;
     public $factory;


    protected $rules = [
        'name' => 'required|unique:factories,name'    ,


    ];

    public function deleteConfirmed(  $id)
    {

       $product = Factory::where('id',$id)->first();
       /* if($product){
           if($product->rowmeterials()->exists()){
            $product->rowmeterials()->delete();
           } */
           $product->delete() ;

           $this->emit('alert',['icon' => 'success','title' => '"'. $product->name.'" is successfully deleted']);
       /*  }else{
            $this->emit('alert',['icon' => 'error','title' => ' Delete is Unsuccessfull']);
       } */
    }

    public function createModalButton()
    {

        $this->reset();
        $this->resetValidation();
        $this->emit('showModal');
    }
    public function updateModal($id)
    {
        $this->resetExcept('factory');
        $this->resetValidation();
        $this->showEditModal = true;
        $this->emit('showModal');
        $this->factory = Factory::where('id',$id)->first();
       /*  $this->request = $this->factory ?? '' ; */
       /* $this->request = $this->factory ?? '' ; */
       $this->name = $this->factory->name;
         //dd($this->category);
    }
    public function updateFactory()
    {

        $this->rules['name'] = $this->rules['name'].','.$this->factory->id.',id,deleted_at,'.null;



        $validatedData = $this->validate();












            $this->factory->update($validatedData);

        $this->reset();

        $this->emit('showModal');
        $this->emit('refresh');
        $this->emit('alert',['icon' => 'success' ,'title' => 'Factory Has been Updated']);

    }
    public function createFactory()
    {



        $validatedData = $this->validate([

            'name' => 'required|unique:categories,name,NULL,id,deleted_at,'.null,


            ]
        );

        Factory::create($validatedData);
        $this->reset();

        $this->emit('showModal');
        $this->emit('refresh');
        $this->emit('alert',['icon' => 'success' ,'title' => 'Factory Has been Created']);
    }


    public function render()
    {
      $factories =  Factory::all();
        return view('livewire.inventory.create-factory',['factories' => $factories]);
    }
}
