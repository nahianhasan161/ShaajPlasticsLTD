<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\File;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class CreateProductCategory extends Component
{
    use WithFileUploads;
    protected $listeners = ['updateModal'];
     public $photo;
    /*  public $tempImage = 'https://i.ibb.co/rskNr5J/bottomH.jpg'; */
     public $category;
    public $showEditModal = false;
    public $request = [
        'name' => '',
        'slug' => '',
        'image' => '',


    ];
    protected $rules = [
        'request.name' => 'required|unique:categories,name'    ,

        'request.slug' => '',

        'request.image' => 'image|max:3024', // 1MB Max
    ];
    public function createModalButton()
    {
        //dd('here');

        //dd($this->request['image']);
        $this->reset();
        $this->resetValidation();
        $this->emit('showModal');
    }
    public function updateModal($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->showEditModal = true;
        $this->category = Category::where('id',$id)->first();
        $this->request = $this->category ?? '' ;
        //dd($this->category);
    }
    public function updateProduct()
    {
        //dd(File::exists($this->request['image']));
        $old = $this->category->image;
        $this->request['image'] = $this->photo ?? '';
        $this->rules['request.image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=300';

        $this->rules['request.name'] = $this->rules['request.name'].','.$this->category->id.',id,deleted_at,'.null;


        $validatedData = $this->validate();
        $validatedData['request']['slug'] =  Str::slug($validatedData['request']['name'], '-');

         if(empty($validatedData['request']['image'])){
            $this->category->update([
                'name' => $validatedData['request']['name'],
                'slug' => $validatedData['request']['slug']
            ]);
        }else{




        if( File::exists($old)){
            $s =  File::delete($old);
        }
                $extension = $this->photo->getClientOriginalExtension();
                $fileName = 'category'. time().'.'. $extension;
            $Path =  $this->photo->storeAs('uploads/category', $fileName,'public');

            if(env('APP_ENV') == 'production'){
                $publicPath = publicPathHelper($Path) ;

              }else{
                $publicPath = 'storage/'. $Path;

              }

            if(File::exists($publicPath)){

                $validatedData['request']['image'] = $publicPath;
                $image = Image::make(public_path($publicPath))->resize(500,300);
                $image->save();

            }

            $this->category->update($validatedData['request']);
        }
        $this->reset();

        $this->emit('showModal');
        $this->emit('refresh');
        $this->emit('alert',['icon' => 'success' ,'title' => 'Product Has been Updated']);

    }
    public function createProduct()
    {

        $this->request['image'] = $this->photo ?? '';

        $validatedData = $this->validate([

            'request.name' => 'required|unique:categories,name,NULL,id,deleted_at,'.null,

            'request.slug' => '',

            'request.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=300', // 1MB Max
            ]
        );

        $extension = $this->photo->getClientOriginalExtension();
        $fileName = 'category'. time().'.'. $extension;
        /*  dd($fileName); */
       // $this->photo->move(); */
        $validatedData['request']['slug'] =  Str::slug($validatedData['request']['name'], '-');
        $Path =  $this->photo->storeAs('uploads/category',$fileName,'public');
        if(env('APP_ENV') == 'production'){
            $publicPath = publicPathHelper($Path) ;

          }else{
            $publicPath = 'storage/'. $Path;

          }



        $validatedData['request']['image'] = $publicPath;
        $image = Image::make(public_path($publicPath))->fit(500,300);
        $image->save();

        //Storage::disk('public')->put('image.jpg',$this->photo);
       //$image =  Image::make($publicPath)->fit('1200','1200');
        //dd($validatedData);

        Category::create($validatedData['request']);
        $this->reset();
        $this->reset('photo');
        $this->emit('showModal');
        $this->emit('refresh');
        $this->emit('alert',['icon' => 'success' ,'title' => 'Product Has been Created']);
    }

    public function render()
    {
        return view('livewire.create-product-category');
    }
}
