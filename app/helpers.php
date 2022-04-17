<?php

use App\Http\Livewire\Website\WebsiteDetails;
use App\Models\WebsiteContactDetails;

if(!function_exists('defaultHelper')){
   function defaultHelper($photo)
    {
        if($photo){

            return str_replace('/website/','/website/thumbnail/',$photo);
        }else{

            return 'https://climate.onep.go.th/wp-content/uploads/2020/01/default-image-300x300.jpg';
        }
    }
}
if(!function_exists('masterEmailHelper')){
   function masterEmailHelper()
    {
      /*   $data = WebsiteContactDetails::first('email');
        $email = $data ? $data->email ?? 'nahianhasan161@gmail.com' : 'nahianhasan161@gmail.com'; */
        /* $email = 'habib@shaajplastic.com'; */
        $email = 'habib@shaajplastic.com';
        return $email;
    }
}
if(!function_exists('publicPathHelper')){
   function publicPathHelper($image)
    {
      /*   $data = WebsiteContactDetails::first('email');
        $email = $data ? $data->email ?? 'nahianhasan161@gmail.com' : 'nahianhasan161@gmail.com'; */
        $path = '/home2/shaajpla/public_html/storage/public/'.$image;
        return $path;
    }
}

//!Price Helper

if(!function_exists('priceHelper')){
    function priceHelper($val1,$val2)
     {

         if($val2 == 0){

             $result = 0;
         }else{
            $result =round($val1 / $val2 ,2);
         }
         return round($result,2);
     }
 }
 //!kg bag conversion Helper
if(!function_exists('kgToBagHelper')){
    function kgToBagHelper($val1)
     {



         return round($val1/ 25,2);
     }

 }
if(!function_exists('bagToKgHelper')){

    function bagToKgHelper($val1)
     {



         return round($val1 * 25,2);
     }
 }
 //!Currency Helpers

if(!function_exists('currencySignHelper')){

    function currencySignHelper($type )
     {


        if($type == 'money' ){
            return "৳";
        }elseif($type == 'lc'){


                return "$" ;

        }else{
            return "৳";
        }



     }
 }

if(!function_exists('convertToUSDHelper')){

    function convertToUSDHelper($money,$rate,$type = 'money')
     {


        if($type == 'money' ){
            return round($money,2);
        }elseif($type == 'lc'){


                return round($money / (floatval($rate) == 0 ? 80 : floatval($rate)) ,2) ;

        }else{
            return round($money,2);
        }



     }
 }
 if(!function_exists('totalPriceHelper')){

    function totalPriceHelper($val1 , $val2)
     {



         return round($val1 * $val2,2);
     }
 if(!function_exists('unitHelper')){

    function unitHelper($val)
     {

        if ($val == 1)
{

    return  " Pis";
}
        if ($val == 25)
{

    return  " Bag";
}


        if ($val == 12)
{
    return  "Dazen";

}



        if ($val == 4){

            return  "CTN";
        }

        if ($val == 100)
{

    return  "Hundred";
}





     }
 }
 }
