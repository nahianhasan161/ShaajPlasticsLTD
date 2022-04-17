<?php

namespace App\Http\Livewire\Website;

use App\Models\WebsiteImage as ModelsWebsiteImage;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class WebsiteImage extends Component
{
    use WithFileUploads;
protected $listeners = ['refresh' => '$refresh'];
//partitial
    protected $thumbnailSize = [
        'width' => '200',
        'height' => '200',
    ];
    protected $landingSize = [
        'width' => '1300',
        'height' => '700',
    ];
    protected $defaultSize = [
        'width' => '650',
        'height' => '300',
    ];

    //variable
    public $office_one;
    public $office_two;
    public $landing_one;
    public $landing_two;
    public $landing_three;
    public $certificate_one;
    public $certificate_two;
    public $certificate_three;
    public $about;
    public $distribution;
    public $thumbnail =[
        'landing_one_thumbnail' => '',
        'landing_two_thumbnail' => '',
        'landing_three_thumbnail' => '',
        'about_thumbnail' => '',
        'distribution_thumbnail' => '',
        'office_one_thumbnail' => '',
        'office_two_thumbnail' => '',
    ];

    protected $rules = [
        'landing_one' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1300,height=700',
        'landing_two' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1300,height=700',
        'landing_three' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1300,height=700',

        'certificate_one' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300',
        'certificate_two' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300',
        'certificate_three' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300',

        'distribution' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300',
        'about' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300',

        'office_one' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300',
        'office_two' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300',
    ];
//partials
    public function removeOld($old)
    {
        File::exists($old) ?
            File::delete($old) : null;
            $thumbnail = File::exists(str_replace('/website/','/website/thumbnail/',$old));
            $thumbnail ?
            File::delete(str_replace('/website/','/website/thumbnail/',$old)) : null;
    }

public function updateImages()
{
    $empty = true;
   $validatedData = $this->validate([
        'landing_one' => '',
        'landing_two' => '',
        'landing_three' => '',

        'certificate_one' => '',
        'certificate_two' => '',
        'certificate_three' => '',

        'distribution' => '',
        'about' => '',

        'office_one' => '',
        'office_two' => '',
    ]);

    foreach($validatedData as $key => $data){
        if(!empty($data)){

          $image =  $this->validate(

            Str::contains($key, 'landing') ?  [
                $key => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1300,height=700'
            ] :  [
                $key => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=650,height=300'
            ]

        );
            /*  dd($image[$key]); */
            $old = $this->images[$key];


            $this->removeOld($old);


            $landing_One_ext = $validatedData[$key]->getClientOriginalExtension();
            $fileName = 'websiteImage-'.$key.'-'.time().'.'.$landing_One_ext;
            $Path = $validatedData[$key]->storeAs('uploads/website',$fileName,'public');
            $thumbnailPath = $validatedData[$key]->storeAs('uploads/website/thumbnail',$fileName,'public');
          if(env('APP_ENV') == 'production'){
            $publicPath = publicPathHelper($Path) ;
            $thumbnailPublicPath = publicPathHelper($thumbnailPath) ;
          }else{
            $publicPath = 'storage/'. $Path;
             $thumbnailPublicPath = 'storage/'. $thumbnailPath;
          }




            if(File::exists($publicPath)){

                $validatedData[$key] = $publicPath;
                $image = Image::make(public_path($thumbnailPublicPath))->resize($this->thumbnailSize['width'],$this->thumbnailSize['height']);
                 if( Str::contains($key, 'landing') ){

                $image = Image::make(public_path($publicPath))->fit($this->landingSize['width'],$this->landingSize['height']);

                 }else{
                    $image = Image::make(public_path($publicPath))->fit($this->defaultSize['width'],$this->defaultSize['height']);
                 }
                 $image->save();
            }

        }else{
            unset($validatedData[$key]);
        }



    }

    ModelsWebsiteImage::first()->update($validatedData);



    $this->emit('refresh');
        $this->reset();

        $this->emit('alert',['title'=> 'Success, Images has been updated','icon' => 'success']);


}
    public function createImages()
    {
        $validatedData = $this->validate();

       foreach($validatedData as $key => $data){

           $landing_One_ext =$validatedData[$key]->getClientOriginalExtension();
           $fileName = 'websiteImage-'.$key.'-'.time().'.'.$landing_One_ext;
           $Path = $validatedData[$key]->storeAs('uploads/website',$fileName,'public');
           $thumbnailPath = $validatedData[$key]->storeAs('uploads/website/thumbnail',$fileName,'public');
           if(env('APP_ENV') == 'production'){
            $publicPath = publicPathHelper($Path) ;
            $thumbnailPublicPath = publicPathHelper($thumbnailPath) ;
          }else{
            $publicPath = 'storage/'. $Path;
             $thumbnailPublicPath = 'storage/'. $thumbnailPath;
          }

           if(File::exists($publicPath)){

            $validatedData[$key] = $publicPath;
            $image = Image::make(public_path($thumbnailPublicPath))->resize($this->thumbnailSize['width'],$this->thumbnailSize['height']);
             if( Str::contains($key, 'landing') ){

            $image = Image::make(public_path($publicPath))->fit($this->landingSize['width'],$this->landingSize['height']);

             }else{
                $image = Image::make(public_path($publicPath))->fit($this->defaultSize['width'],$this->defaultSize['width']);
             }
             $image->save();
        }
        $validatedData[$key] = $publicPath;
        $this->thumbnail[$key.'_thumbnail'] = $thumbnailPublicPath;

       }
       /*  dd($validatedData['landing_one']); */

     /*  dd(array_merge($this->thumbnail,$validatedData)); */
     ModelsWebsiteImage::create($validatedData);

            $this->reset();
            $this->emit('alert',['title'=> 'Success, Images has been created','icon' => 'success']);




        }
        public function getImagesProperty()
        {
            return ModelsWebsiteImage::all()->first();
        }
       //dd();

    public function render()
    {
        /* dd($this->images); */
        return view('livewire.website.website-image',['images'=> $this->images]);
    }
}
