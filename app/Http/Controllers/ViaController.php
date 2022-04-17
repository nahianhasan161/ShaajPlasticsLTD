<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ViaController extends Controller
{
    public function clientBills(Client $client)
    {
        return view('authenticated.admin.company.clientview',compact('client'));
    }
}
