<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountTransection;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function history()
    {
        $histories = AccountTransection::orderBy('created_at','desc')->paginate();
        $account = Account::first();
        return view('authenticated.admin.account.history',compact('histories','account'));
    }
}
