<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
     $product=Product::with('tags','images')->get();
    // dd($product);
        return view('product.index',compact('product'));
    }


    public function create()
    {
        $tag=Tag::all();
        return view('product.create',compact('tag'));
    }


    public function store(Request $request)
    {
        $product=Product::create($request->all());

        if ($images = $request->file('image')) {
            foreach ($images as $image) {
                $image->store('product', 'public');
                $product->images()->create([
                    'product_id' => $product->id,
                    'image_url' => "/storage/product/" . $image->hashName()
                ]);
            }
        }

        $product->save();

        return redirect()->route('products.index')->with(['message'=>'Create Successfully']);
    }


    public function show( $id)
    {
        $product=Product::findOrFail($id);
        return view('product.show',compact('product'));
    }


    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }


    public function update(Request $request,$id)
    {
        $products=Product::findOrFail($id);
        $products->name=$request->name;
        $products->price=$request->price;

        if ($images = $request->file('image')) {
            foreach ($images as $image) {
                $image->store('product', 'public');
                $products->images()->update([
                    'product_id' => $products->id,
                    'image_url' => "/storage/product/" . $image->hashName()
                ]);
            }
        }

        $products->save();

        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->images()->delete();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully.');
    }
}
