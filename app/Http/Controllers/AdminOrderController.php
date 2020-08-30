<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('users')->join('order', 'users.id', '=', 'order.user_id')->get();
        $data = [
            'orders' => $orders,
        ];

        return view('admin.order.index', $data);
    }

    public function accept($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 1;
        $order->save();

        return redirect()->back();
    }
}
