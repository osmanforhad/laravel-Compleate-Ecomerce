<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('user.wishlists.wishlist', compact('wishlists'));
    }

    public function AddToWishlist(Request $request){
        if(Auth::check()) {
            $product_id = $request->input('product_id');
            if(Product::find($product_id)){
                $wishlist = new Wishlist();
                $wishlist->product_id = $product_id;
                $wishlist->user_id = Auth::id();
                $wishlist->save();
                return response()->json([
                    'status' => "Product added to wishlist",
                ]);
            }
            else {
                return response()->json([
                    'status' => "Product doesn't exists",
                ]);
            }
        }
        else {
            return response()->json([
                'status' => "Please Login first",
            ]);
        }
    }

    public function removeWishlistItem(Request $request){
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if(Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $wishlistItem = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $wishlistItem->delete();
                return response()->json([
                    'status' => "item removed from wishlist",
                ]);
            }
        } else {
            return response()->json([
                'status' => "Please Login first",
            ]);
        }
    }

    public function wishlistCount(){
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json([
            'wishlistCount' => $wishlistCount,
        ]);
    }

}
