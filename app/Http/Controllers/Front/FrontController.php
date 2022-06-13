<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        $trending_products = Product::where('trending', '1')->orderBy('id', 'DESC')->take(15)->get();
        $popular_categories = Category::where('popular', '1')->orderBy('id', 'DESC')->take(15)->get();
        return view('fontend.index', compact([
            'trending_products',
            'popular_categories'
        ]));
    }

    public function category()
    {
        $categories = Category::where('status', '0')->get();
        return view('fontend.category', compact('categories'));
    }

    public function viewCategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {

            $category =  Category::where('slug', $slug)->first();
            $products = Product::where('cat_id', $category->id)->where('status', '1')->get();

            return view('fontend.products.index', compact([
                'category',
                'products',
            ]));
        } else {
            return redirect()->route('/')->with('status', "link does't exists");
        }
    }

    public function productDetails($category_slug, $product_slug){
        if (Category::where('slug', $category_slug)->exists()) {

            if(Product::where('slug', $product_slug)->exists()){
                $product = Product::where('slug', $product_slug)->first();
                return view('fontend.products.productdetails', compact('product'));
            }
            else {
                return redirect()->route('/')->with('status', "No such product found");
            }
        }
        else {
            return redirect()->route('/')->with('status', "No such category found");
        }
    }


}
