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
    public $tempImage = 'https://i.ibb.co/rskNr5J/bottomH.jpg';
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
        'request.name' => 'required|max:15',
        'request.quantity' => 'required|numeric|min:1',
        'request.meterial' => 'required|max:15',
        'request.code' => 'required|max:15',
        'request.color' => 'required|max:15',
        'request.thickness' => 'required|numeric|min:1',
        'request.weight' => 'required|numeric|min:1',
        'request.packaging' => 'required|max:15',
        'request.stripes' => 'required|numeric|min:1',
        'request.price' => 'required|numeric|min:1',
        'request.category_id' => 'required',
        /* 'request.photo' => '', */
         'request.image' => '', // 1MB Max
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


        $this->request['image'] = $this->photo ?? '';
        $this->rules['request.image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=300';
        $validatedData = $this->validate();
        $old = $this->product->image;


         if(empty($validatedData['request']['image'])){

           $data =  Arr::except($validatedData['request'],'image');

          $updated =  $this->product->update($data);

        }else{





        if( File::exists($old)){

            $s =  File::delete($old);
        }   if($validatedData['request']['image']){

            $extension = $validatedData['request']['image']->getClientOriginalExtension();
            $fileName = 'plasticproduct'. time().'.'. $extension;

            $Path =  $validatedData['request']['image']->storeAs('uploads/products',$fileName,'public');
            if(env('APP_ENV') == 'production'){
                $publicPath = publicPathHelper($Path) ;

              }else{
                $publicPath = 'storage/'. $Path;

              }

        }
            if(File::exists($publicPath)){

                $validatedData['request']['image'] = $publicPath;
                $image = Image::make(public_path($publicPath))->fit(500,300);
                $image->save($fileName,80,$extension);

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


     $this->request['image'] = $this->photo ;
     $this->rules['request.image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=300';

       $validatedData = $this->validate();

                $extension = $validatedData['request']['image']->getClientOriginalExtension();
                $fileName = 'plasticproduct'. time().'.'. $extension;

       $Path =  $validatedData['request']['image']->storeAs('uploads/products',$fileName,'public');
       if(env('APP_ENV') == 'production'){
        $publicPath = publicPathHelper($Path) ;

      }else{
        $publicPath = 'storage/'. $Path;

      }


       $validatedData['request']['image'] = $publicPath;

        $image = Image::make(public_path($publicPath))->fit(500,300);
        $image->save($fileName,80,$extension);

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
