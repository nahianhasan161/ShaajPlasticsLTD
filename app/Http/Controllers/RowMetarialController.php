<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\RowMetarial;


class RowMetarialController extends Controller
{



    public function show(RowMetarial $id)
    {
       // dd(RowMetarial::where('id',5));
     //RowMetarial::findorFail($id);
          $data = $id;
        return view('authenticated.admin.inventory.show_row_metarial' ,compact('data') );
    }
    public function createMeterial(Factory $id)
    {
       // dd(RowMetarial::where('id',5));
       /* dd($id); */

       $factory = $id;

        return view('authenticated.admin.inventory.row_metarial' ,compact('factory') );
    }
    public function showProduction(Factory $id)
    {
       // dd(RowMetarial::where('id',5));
       /* dd($id); */

       $factory = $id;
        $productions = $factory->productions()->whereNull('parent_id')->orderBy('created_at', 'DESC')->paginate();
       return view('authenticated.admin.inventory.row_material_production_history',compact('factory','productions') );
    }
    public function createProduction(Factory $id)
    {
       // dd(RowMetarial::where('id',5));
       /* dd($id); */

       $factory = $id;

       return view('authenticated.admin.inventory.production' ,compact('factory') );
    }

    public function history(RowMetarial $id)
    {
/* dd($id); */
        $RowMaterial = $id;
        return view('authenticated.admin.inventory.row_metarial_transection_history' ,compact('RowMaterial') );
    }
}
