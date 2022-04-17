<?php

namespace App\Http\Livewire\Website;

use App\Models\WebsiteContactDetails;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WebsiteDetails extends Component
{
    /* protected $listeners = ['$refresh']; */
    public $item ;
    public $request = [
        'email' => '',

        'office_one_phone' => '',
        'office_two_phone' => '',

        'office_one_address' => '',
        'office_two_address' => '',

        'facebook' => '',
        'whatsapp' => '',
        'twitter' => '',
        'youtube' => '',
        'youtube_video' => '',
        'map' => '',

        'landing_title' => '',
        'aboutUS' => '',




        'distribution_title' => '',
        'distribution_description' => '',

    ];

    public $services = [

        'title_one' => '',
        'description_one' => '',

        'title_two' => '',
        'description_two' => '',

        'title_three' => '',
        'description_three' => '',

        'title_four' => '',
        'description_four' => '',

        'title_five' => '',
        'description_five' => '',

        'title_six' => '',
        'description_six' => '',
    ];
    public $feature = [

        'title_one' => '',
        'description_one' => '',

        'title_two' => '',
        'description_two' => '',

        'title_three' => '',
        'description_three' => '',
    ];

    protected $rules = [

        'request.email' =>'required',


        'request.facebook' =>'required',
        'request.whatsapp' =>'required',
        'request.twitter' =>'required',
        'request.map' =>'required',
        'request.youtube' =>'required',
        'request.youtube_video' =>'required',

        'request.office_one_address' =>'required',
        'request.office_two_address' =>'required',

        'request.office_one_phone' =>'required',
        'request.office_two_phone' =>'required',

        'request.propiter' =>'required|max:150',

        'request.landing_title_one' =>'required|max:150',
        'request.landing_title_two' =>'required|max:150',
        'request.landing_title_three' =>'required|max:150',
        'request.aboutUs' =>'required|max:400',


        'request.distribution_title' =>'required',
        'request.distribution_description' =>'required',

        'services.title_one' =>'required|max:50',
        'services.description_one' =>'required|min:300|max:400',

        'services.title_two' =>'required|max:50',
        'services.description_two' =>'required|min:300|max:400',

        'services.title_three' =>'required|max:50',
        'services.description_three' =>'required|min:300|max:400',

        'services.title_four' =>'required|max:50',
        'services.description_four' =>'required|min:300|max:400',

        'services.title_five' =>'required|max:50',
        'services.description_five' =>'required|min:300|max:400',

        'services.title_six' =>'required|max:50',
        'services.description_six' =>'required|min:300|max:400',

        'feature.title_one' =>'required|max:50',
        'feature.description_one' =>'required|min:300|max:400',

        'feature.title_two' =>'required|max:50',
        'feature.description_two' =>'required|min:300|max:400',

        'feature.title_three' =>'required|max:50',
        'feature.description_three' =>'required|min:300|max:400',


    ];

    public function createDetails()
    {

        $validatedData = $this->validate();

        $details = $validatedData['request'];
        $services = $validatedData['services'];
        $feature = $validatedData['feature'];

        DB::transaction(function() use ($details,$services,$feature ){

            $details =  WebsiteContactDetails::create($details);
            $details->service()->create($services);
            $details->feature()->create($feature);
        });
        $this->emit('alert',['icon'=>'success','title' => 'Successfully Updated']);
        $this->mount();

    }
    public function updateDetails()
    {

        $validatedData = $this->validate();
        $details = $validatedData['request'];
        $services = $validatedData['services'];
        $feature = $validatedData['feature'];
        DB::transaction(function() use ($details,$services,$feature ){

            WebsiteContactDetails::first()->update($details);
            WebsiteContactDetails::first()->first()->service()->update($services);
            WebsiteContactDetails::first()->feature()->update($feature);
        });

    /*   $details =   WebsiteContactDetails::first()->update($validatedData['request']); */
        $this->emit('alert',['icon'=>'success','title' => 'Successfully Updated']);
    }
    public function mount()
    {

        $this->request =  WebsiteContactDetails::get()->first();

        if($this->request){
            $this->feature = $this->request->feature()->first();
            $this->services= $this->request->service()->first();

        }

        $this->item = is_null($this->request) ;
    }
    public function render()
    {



        return view('livewire.website.website-details');
    }
}
