<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function create( Order $order)
    {

        return view('authenticated.admin.bill.create',compact('order'));
    }
    public function edit( Order $order,Bill $bills)
    {

        return view('authenticated.admin.bill.edit',compact('order','bills'));
    }
    public function invoice( Order $order,Bill $bill)
    {
       /*  dd($bill->client); */

        return view('authenticated.admin.bill.invoice',compact('order','bill'));
    }
    public function all(Order  $order)
    {

        return view('authenticated.admin.bill.bills',compact('order'));
    }
}
