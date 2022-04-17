<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PlasticProduct;
use App\Models\WebsiteContactDetails;
use App\Models\WebsiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function search($term = '')
    {
        $active = 'products';
        $details = WebsiteContactDetails::get()->first();
        $images = WebsiteImage::get()->first();
        $categories =

        Cache::remember('product.category',now()->addMinute('1'),function(){
           return   Category::all();
        });

        $categoryName = $term;
        $products = PlasticProduct::with('category')->
        where('name','LIKE','%'.$term.'%')
        ->orWhere('meterial','LIKE','%'.$term.'%')
        ->orWhere('code','LIKE','%'.$term.'%')
        ->orWhere('weight','LIKE','%'.$term.'%')
        ->orWhere('stripes','LIKE','%'.$term.'%')
        ->orWhere('thickness','LIKE','%'.$term.'%')
        ->orWhere('color','LIKE','%'.$term.'%')
        ->orWhere('packaging','LIKE','%'.$term.'%')
        ->orWhereHas('category',  function ($query) use ($term) {$query->where('name', 'like', '%'.$term.'%');})
        ->get();

        return view('components.Frontend.plastic_products',compact('products','categoryName','term','active','details','categories'));
    }
    public function show()
    {
       /*  Cache::forget('product.category'); */
       $active = 'products';
       $details = WebsiteContactDetails::get()->first();
       $images = WebsiteImage::get()->first();
       $categories =

       Cache::remember('product.category',now()->addMinute('1'),function(){
          return   Category::all();
       });


        $categories =
         Cache::remember('product.category',now()->addMinute('1'),function(){
            return   Category::all();
         });
        return view('components.Frontend.products',compact('categories','active','details','images'));
    }
/* a */
    public function products(Category $category)
    {
        /* Cache::forget('product.plastic.categoryName'); */



        $term = '';
        $active = 'products';
        $details = WebsiteContactDetails::get()->first();
       $images = WebsiteImage::get()->first();
       $categories =

       Cache::remember('product.category',now()->addMinute('1'),function(){
          return   Category::all();
       });


         $categoryName = Cache::remember('product.plastic.categoryName'.$category->name,now()->addMinute('1'),function() use ($category){
            return   $category->name;
         });
        $products =
         Cache::remember('product.plastic'.$category->name,now()->addMinute('1'),function() use ($category){
            return   $category->products;
       });

        return view('components.Frontend.plastic_products',compact('products','categoryName','term','details','images','categories','active'));
    }
    public function getRouteKeyName()
{
    return 'slug';
}
}
