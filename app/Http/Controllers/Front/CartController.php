<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function CartProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->first();

            if ($product_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json([
                        'status' => $product_check->name . " Already Added to Cart",
                    ]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_qty = $product_qty;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                    return response()->json([
                        'status' => $product_check->name . " Added to Cart",
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => "Please Login first",
            ]);
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('fontend.cart', compact('cartItems'));
    }

    public function updateCart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Auth::check()) {
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->product_qty = $product_qty;
                $cart->update();
                return response()->json([
                    'status' => "Cart Updated Successfully",
                ]);
            }
        }
    }

    public function deleteCartItem(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json([
                    'status' => "item removed from cart",
                ]);
            }
        } else {
            return response()->json([
                'status' => "Please Login first",
            ]);
        }
    }

    public function cartCount(){
        $cartCount = Cart::where('user_id', Auth::id())->count();
        return response()->json([
            'cartCount' => $cartCount,
        ]);
    }

}
