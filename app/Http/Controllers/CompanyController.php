<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountTransection;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $histories = AccountTransection::orderBy('created_at','desc')->paginate();
        $account = Account::first();
        return view('authenticated.admin.dashboard',compact('histories','account'));
    }
}
