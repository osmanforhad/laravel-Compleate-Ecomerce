<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.order.index', compact('orders'));
    }

    public function orderDetails($id){
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('user.order.orderDetails', compact('orders'));
    }


}
