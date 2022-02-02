<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\PlasticProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePlasticProduct extends Component
{
    use WithFileUploads;
    protected $listeners = ['updateModal'];
     public $photo;
     public $product;
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
        'image' => '',
        'category_id' => ''
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
        'request.category_id' => 'required',
        /* 'request.photo' => '', */
         'request.image' => 'required|image|max:1024', // 1MB Max
    ];
    public function createModalButton()
    {
        $this->reset();
        $this->resetValidation();
        $this->emit('showModal');
    }
    public function updateModal($id)
    {

        $this->reset();
        $this->resetValidation();
        $this->showEditModal = true;
        $this->product = PlasticProduct::where('id',$id)->first();
        $this->request = $this->product ?? '' ;
        //dd($this->product);
    }
    public function updateProduct()
    {
        //dd(File::exists($this->request['image']));

        $old = $this->request['image'];
        $this->request['image'] = $this->photo ?? '';
        $this->rules['request.image'] = 'image|max:3024';
        $validatedData = $this->validate();



         if(empty($validatedData['request']['image'])){

           $data =  Arr::except($validatedData['request'],'image');

          $updated =  $this->product->update($data);

        }else{




        if( File::exists($old)){
            $s =  File::delete($old);
        }

            $Path =  $this->photo->store('uploads/products','public');
            $publicPath = 'storage/'. $Path;

            if(File::exists($publicPath)){

                $validatedData['request']['image'] = $publicPath;
                $image = Image::make(public_path($publicPath))->resize(500,300);
                $image->save();

            }

            $this->product->update($validatedData['request']);
        }
        $this->reset();

        $this->emit('showModal');
        $this->emit('refresh');
        $this->emit('alert',['icon' => 'success' ,'title' => 'Product Has been Updated']);

    }
    public function createProduct()
    {

     /*    $this->request['photo'] = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyXvzJib8clmr-0OhQgf-bd4CAyj_NUdWj3A&usqp=CAU'; */
     $this->request['image'] = $this->photo ;
       $validatedData = $this->validate();
        $Path =  $this->photo->store('uploads/products','public');
        $publicPath = 'storage/'. $Path;


        $validatedData['request']['image'] = $publicPath;

        $image = Image::make(public_path($publicPath))->resize(500,300);
        $image->save();

        //dd($this->request);
        PlasticProduct::create($validatedData['request']);
        $this->emit('showModal');
        $this->reset();
        $this->emit('refresh');
        $this->emit('alert',['icon' => 'success' ,'title' => 'Product Has been Created']);
    }

    public function getCategoriesProperty()
    {
        return Category::all();
    }
    public function render()
    {
        return view('livewire.create-plastic-product',['categories' => $this->categories]);
    }
}
