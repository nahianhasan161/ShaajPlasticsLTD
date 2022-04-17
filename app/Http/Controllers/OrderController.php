<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function edit(Order $id)
    {
        $order = $id;

        return view('authenticated.admin.order.edit',compact('order'));
    }

    public function invoice(Order $id)
    {
        $order = $id;
        return view('authenticated.admin.order.invoice',compact('order'));
    }
}
