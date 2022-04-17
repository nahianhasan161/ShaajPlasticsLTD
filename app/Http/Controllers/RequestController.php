<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\WebsiteContactDetails;
use App\Models\WebsiteImage;
use Illuminate\Support\Facades\Cache;

class RequestController extends Controller
{
    public function welcome()
    {

        $details = WebsiteContactDetails::get()->first();
        $images = WebsiteImage::get()->first();
        $categories =

        Cache::remember('product.category',now()->addMinute('1'),function(){
           return   Category::all();
        });

        $active = 'home';

        return view('components.Frontend.welcome',compact('details','images','active','categories'));
    }
    public function services()
    {
        $details = WebsiteContactDetails::get()->first();
        $images = WebsiteImage::get()->first();

        $active = 'services';
        $categories =

        Cache::remember('product.category',now()->addMinute('1'),function(){
           return   Category::all();
        });

        return view('components.Frontend.services',compact('details','images','active','categories'));
    }
    public function contacts()
    {
        $details = WebsiteContactDetails::get()->first();
        $images = WebsiteImage::get()->first();

        $active = 'contacts';
        $categories =

        Cache::remember('product.category',now()->addMinute('1'),function(){
           return   Category::all();
        });
        return view('components.Frontend.contacts',compact('details','images','active','categories'));
    }
    public function about()
    {
        $details = WebsiteContactDetails::get()->first();
        $images = WebsiteImage::get()->first();
        $active = 'about';
        $categories =

        Cache::remember('product.category',now()->addMinute('1'),function(){
           return   Category::all();
        });

        return view('components.Frontend.about',compact('details','images','active','categories'));
    }
   /*  public function login()
    {
        $details = WebsiteContactDetails::get()->first();
        $images = WebsiteImage::get()->first();
        $active = 'login';

        return view('components.Frontend.login',compact('details','images','active'));
    } */
}
