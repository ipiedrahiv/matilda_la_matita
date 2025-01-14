<?php

// Santiago Santacruz

// Santiago Santacruz

// Santiago Santacruz

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show($id)
    {
        $data = []; //What will be sent to the view
        $order = Order::with('items')->find($id);
        $data['order'] = $order;
        $data['title'] = __('order.list');

        return view('order.show')->with('data', $data);
    }

    public function listAll()
    {
        $id = Auth::user()->getId();
        $data = [];
        $data['title'] = __('order.created');
        $data['orders'] = Order::where('user_id', $id)->get();

        return view('order.index')->with('data', $data);
    }

    public function download($id)
    {
        $data = [];
        $data['title'] = __('order.receipt');
        $order = Order::with('items')->find($id);
        $data['order'] = $order;

        return view('order.download')->with('data', $data);
    }
}
