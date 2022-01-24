<?php

namespace App\Http\Controllers;

use App\Models\RowMetarial;
use Illuminate\Http\Request;

class RowMetarialController extends Controller
{
    public function show(RowMetarial $id)
    {
       // dd(RowMetarial::where('id',5));
     //RowMetarial::findorFail($id);
          $data = $id;
        return view('authenticated.admin.inventory.show_row_metarial' ,compact('data') );
    }
}
