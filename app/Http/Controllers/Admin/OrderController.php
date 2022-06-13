<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        $orders = Order::where('status', '0')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function orderDetails($id){
        $orders = Order::where('id', $id)->first();
        return view('admin.order.orderDetails', compact('orders'));
    }

    public function updateOrder(Request $request, $id){
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect()->route('orders.list')->with('status', "order Updated Successfully");
    }

    public function orderHistory(){
        $orders = Order::where('status', '1')->get();
        return view('admin.order.orderHistory', compact('orders'));
    }

}
