<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Cart;
use App\Traits\image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use image;

    /*public function api()
    {
        $product=Product::with('tags')->paginate(10);
       // dd($product);
        return  ProductResource::collection($product);
    }
    public function getId($id){
        $product= Product::with('tags')->find($id);
        return new ProductResource($product);
    }

    public function add(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'price' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return  response()->json([$validator->errors(),
        ], 400);
        } else
            $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();
        return response()->json(new ProductResource($product), Response::HTTP_CREATED);
    }

    public function apiUpdate(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();
        return response()->json(new ProductResource($product), Response::HTTP_OK);
    }

    public function apiDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function search($value)
    {
        return Product::where('name', 'like', '%' . $value . '%')->orWhere('price', 'like', '%' . $value . '%')->get();
    }*/

    public function cart_store(Request $request){

      //  echo 'hi';
        $product=Product::with('images')->findOrFail($request->input('product_id'));
       // dd($product);
        Cart::add($product->id,$product->name,$product->qty,$product->price,90);

        return redirect()->route('cart');
    }

    public function cart()
    {
        $product=Cart::get();
      //  dd($product);
        $user=\auth()->user();
        $count=Cart::where('user_id',$user->id)->count();
        return view('ecommerce.cart', compact('product','count'));
    }

    public function addCart(Request $request,$id)
    {
        if (Auth::id()){
            $user=auth()->user();
            $product=Product::with('images')->find($id);

            $cart=new Cart;
            $cart->name=$user->name;
            $cart->product_name=$product->name;
            $cart->price=$product->price;
            $cart->qty=$request->qty;
            foreach ($product->images as $image){
               $cart->image=$image->image_url;
            }
            $cart->user_id=$user->id;

            $cart->save();


            return redirect()->back()->with('message','Product Add to Cart');
        }else{
            return redirect('auth.login');
        }
    }

    public function cart_show($id)
    {
        $product = Product::with( 'images')->find($id);
        $user=\auth()->user();
        $count=Cart::where('user_id',$user->id)->count();
        return view('ecommerce.cartShow', compact('product','count'));
    }

    public function dashboard()
    {
        $product = Product::with( 'images')->get();
        $user=\auth()->user();
        $count=Cart::where('user_id',$user->id)->count();
        return view('dashboard', compact('product','count'));
    }

    public function product()
    {
        $product = Product::with( 'images')->get();
        $user=\auth()->user();
        $count=Cart::where('user_id',$user->id)->count();
        return view('ecommerce.product', compact('product','count'));
    }


    public function cartDelete($id){
       $cart= Cart::find($id);
       $cart->delete();

       return redirect()->route('cart');
    }

    public function index(Request $request)
    {
        $product = Product::with( 'images')->get();
        // dd($product);
        return view('product.index', compact('product'));
    }


    public function create()
    {
        $tag = Tag::all();
        return view('product.create', compact('tag'));
    }


    public function store(Request $request)
    {
        $product = Product::create($request->all());

        if ($request->hasFile('image')) {
            $request->image = $this->singleFileUpload($request->image, "product", $product->image);
            $product->images()->create([
                'product_id' => $product->id,
                'image_url' => "/storage/" . $request->image
            ]);
        }

        $product->save();

        return redirect()->route('products.index')->with(['message' => 'Create Successfully']);
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->qty = $request->qty;

        if ($request->hasFile('image')) {
            $request->image = $this->singleFileUpload($request->image, "product", $products->image);
            $products->images()->create([
                'product_id' => $products->id,
                'image_url' => "/storage/" . $request->image
            ]);
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
