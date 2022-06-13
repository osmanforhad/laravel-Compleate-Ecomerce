<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){
        $product = new Product();
        $product->name = $request->input('name');
        $product->cat_id = $request->input('cat_id');
        $product->slug = $request->input('slug');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('admin/uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->save();
        return redirect()->route('product.show')->with('status', "Product added Successfully");

    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.product.edit', compact([
            'product',
            'categories',
        ]));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->cat_id = $request->input('cat_id');
        $product->slug = $request->input('slug');
        if($request->hasFile('image')){
            $path = 'admin/uploads/products/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('admin/uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->update();
        return redirect()->route('product.show')->with('status', "Product updated Successfully");
    }

    public function destroy($id){
        $product = Product::find($id);
        $destination_path = 'admin/uploads/products/'.$product->image;
        if(File::exists($destination_path)){
            File::delete($destination_path);
        }
        $product->delete();
        return redirect()->route('product.show')->with('status', 'Product deleted Successfully');
    }

}
