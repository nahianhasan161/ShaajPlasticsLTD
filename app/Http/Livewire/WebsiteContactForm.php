<?php

namespace App\Http\Livewire;

use App\Mail\ClientMail;
use App\Models\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class WebsiteContactForm extends Component
{
    public $request = [
        'name' => '',
        'phone' => '',
        'email' => '',
        'note' => '',
    ];
    protected $rules = [
        'request.name' => 'required|max:50',
        'request.phone' => 'required|max:14',
        'request.email' => 'required|email',
        'request.note' => 'max:250',
    ];
    public function createContact()
    {

       $dayLimit = RateLimiter::attempt(
        'send-message',
        $perDay = 299,
        function() {
            $ip = request()->ip();
            $ipLimit = RateLimiter::attempt(
                'send-message:'.$ip,
                $perMinute = 5,
                function() {

        $this->request['type'] = 'CallBack';
        $validatedData =  $this->validate();
       $data = Request::create(

            array_merge($validatedData['request'],['type' => 'contact']));
      Mail::to(masterEmailHelper())->send(new ClientMail($data));


        $this->reset(['request']);
        $this->emit('showModal');
        $this->emit('alert',['icon' =>'success','title' => 'Your Message Has Been Send']);
    }
);

if (! $ipLimit) {
    $this->emit('alert',['icon' =>'error','title' => 'Wait a Minute.. Too many messages sent !']);

}
}
);

if (! $dayLimit) {
$this->emit('alert',['icon' =>'error','title' => 'Daily messages Limit Has Been Reached ']);

}
}





    public function render()
    {
        return view('livewire.website-contact-form');
    }
}
