<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function deliveries(Order $id)
    {
      $order = $id;
        /* dd($id); */
        return view('authenticated.admin.delivery.deliveries',compact('order'));
    }

    public function invoice(Delivery $id)
    {
        $delivery = $id;
        return view('authenticated.admin.delivery.invoice',compact('delivery'));
    }
}
