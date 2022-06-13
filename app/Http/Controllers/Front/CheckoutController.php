<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index(){
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $cartItem){
            if(!Product::where('id', $cartItem->product_id)->where('qty', '>=', $cartItem->product_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $cartItem->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('fontend.checkout', compact('cartItems'));
    }

    public function placeOrder(Request $request){
        $order = new Order();
        //place the order details
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->firstAddress = $request->input('firstAddress');
        $order->secondAddress = $request->input('secondAddress');
        $order->city = $request->input('city');
        $order->pincode = $request->input('pincode');
        //calculate the total amount of shopping
        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems_total as $total_Shopping){
            $total += $total_Shopping->products->selling_price * $total_Shopping->product_qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'E_shop'.rand(1111, 9999);
        $order->save();

        //place the order item
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $cartItem){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_qty' => $cartItem->product_qty,
                'price' => $cartItem->products->selling_price,
            ]);
            //after place any product order then reduce the product quantity from product table
            $product = Product::where('id', $cartItem->product_id)->first();
            $product->qty = $product->qty - $cartItem->product_qty;
            $product->update();
        }

        //if user already place and order with her details
        if(Auth::user()->firstAddress == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->firstAddress = $request->input('firstAddress');
            $user->secondAddress = $request->input('secondAddress');
            $user->city = $request->input('city');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        //after placed order make empty the shopping cart
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect()->route('front.home')->with('status', "Order Placed Successfully");
    }

}
