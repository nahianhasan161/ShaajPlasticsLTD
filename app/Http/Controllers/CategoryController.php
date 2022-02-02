<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PlasticProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function show()
    {
        //Cache::forget('product.category');
        $categories =
        Cache::remember('product.category',now()->addMinute('1'),function(){
            return  Category::all();
        });
        return view('components.Frontend.products',compact('categories'));
    }

    public function products(Category $category)
    {
        //Cache::forget('product.plastic.categoryName');
        $categoryName = Cache::remember('product.plastic.categoryName'.$category->name,now()->addMinute('1'),function() use ($category){
            return  $category->name;
        });
        $products =  Cache::remember('product.plastic'.$category->name,now()->addMinute('1'),function() use ($category){
            return  $category->products()->get();
        });
        return view('components.Frontend.plastic_products',compact('products','categoryName'));
    }
    public function getRouteKeyName()
{
    return 'slug';
}
}
