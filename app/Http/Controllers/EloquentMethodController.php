<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentMethodController extends Controller
{
    public function index(Request $request){
        $product=Product::all(); //retrieve all value
        $product=Product::all('price'); //retrieve only all price
        $product=Product::all(['price','name']); //retrieve all price and name
       // $product=Product::where('price',1500)->all(); //not working because all method can't modify any query


        //dd($product);
       /* foreach ($product as $list){
          echo $list->price;
        }*/


        //get() and all() are all most same, just deference get can modify query
        $get=Product::get(); //retrieve all value
        $get=Product::get('name'); //retrieve only all name
        $get=Product::get(['name','price']); //retrieve all price and name
        $get=Product::where('id','>=',11)->get(); //retrieve all value where id>=11
        $get=Product::where('id','>=',11)->get('price'); //retrieve only price where id>=11
        $get=Product::where('id','>=',11)->get(['price','name']); //retrieve name and price where id>=11

        //dd($get);
        foreach ($get as $list){
            echo $list->name." , ";
        }



        //average
        $avg=Product::pluck('price')->avg();
        $avg=Product::all()->avg('price');
      //  $avg=Product::get()->avg(); //not working
        $avg=Product::get()->avg('price');
        $avg=Product::avg('price');
        $avg=Product::where('price','>',500)->avg('price');

       // dd($avg);

        //chunk
     //   $chunk=Product::chunk(20); //not working
        Product::chunk(20, function ($product){
           // dd($product);
            foreach ($product as $item){
              //  dd($item->sum('price'));
              //  dd($item->count());
              $price=  $item->price;
            }
         //   dd($price);
        });

        //combine
        $keys = ['a', 'b', 'c'];
        $values = [1, 2, 3];
        $combined = collect($keys)->combine($values);

       // dd($combined->get('a'));

        //concat
     $product=Product::find(20);
   //  dd($product);
    // $product->concat('name', ' asif');
        $product->save();
    // dd($product);

        //contains
        $contains = Product::get();
        $contains->contains(function ($contain) {
           echo $contain->name == 'Bat';
           echo "  ";
        });
        $contains = Product::all();
       // dd($contains);
        $contains->contains(function ($contain) {
           // dd( $contain->price == 1);
        });

        //count
        $count=Product::count();
        $count=Product::get()->count();
        $count=Product::all()->count();
        $count=Product::pluck('name')->count();
        $count=Product::where('id','>',5)->count();
        $count=Product::where('price','>',5000)->count();
        $count=Product::get('price')->count();
        $count=Product::where('category_id','>',10)->count();
       // dd($count);

        //countBy
      //  $countBy = Product::get()->countBy();  //not working
        $countBy = Product::get()->countBy('price')->sum();
        $countBy = Product::get()->countBy('price');

        foreach ($countBy as $key=> $item){
            echo $key." ,";
        }
      //  dd($countBy);


        //diff
      //  $price=Product::all();
     //   $quary=Product::where('price','>',1000)->get();

        $price=Product::pluck('price');
        $quary=Product::where('price','>',1000)->pluck('price');
       // $diff=$quary->diff($price);
       // dd($price->diff($quary));

        //diffAssoc
        $diffAssoc=Product::find(20);
        //dd($diffAssoc);
       /* $diff=$diffAssoc->diffAssoc([
            'name'=>'asif',
            'price'=>1100,
            'category_id'=>8,
            'status'=>1
        ]);*/
       // dd($diff->all());

        //diffKeys
        $collection = collect([
            'one' => 10,
            'two' => 20,
            'three' => 30,
            'four' => 40,
            'five' => 50,
        ]);

        $diff = $collection->diffKeys([
            'two' => 2,
            'four' => 4,
            'six' => 6,
            'eight' => 8,
        ]);

       // dd($diff);

    //max
        $max=Product::get()->max('price');
        $max=Product::pluck('price')->max();
        $max=Product::max('price');
        $max=Product::where('price','>',500)->max('price');
       // dd($max);

    //min
        $min=Product::get()->min('price');
        $min=Product::pluck('price')->min();
        $min=Product::min('price');
        $min=Product::where('price','>',500)->min('price');
       // dd($min);

    //sum
        $sum=Product::get()->sum('price');
        $sum=Product::pluck('price')->sum();
        $sum=Product::sum('price');
        $sum=Product::where('price','<',500)->sum('price');
      //  dd($sum);

        //last
    //  $last= Product::last(); //not working
    //  $last= Product::get()->last('price'); //not working
        $last= Product::get()->last();
      $last= Product::pluck('price')->last();
      $last= Product::get('price')->last();
     // dd($last);


        //23/01/2023

        //groupBy
        $groupBy=Product::groupBy('name')->get();
      //  dd($groupBy);
        $groupBy=Product::get()->groupBy('name');
        $groupBy=Product::groupBy('name')->get()->count();
        $groupBy=Product::groupBy('name')->get()->sum('price');
      //  dd($groupBy);

        //filter
       // $filter=Product::filter(['price'=>'>',500])->get();
       // dd($filter);

        //first
        $first=Product::first();
      //  dd($first);
        $first=Product::where('category_id','>',10)->first();
        $first=Product::where('category_id','>',10)->first('name');
        $first=Product::where('category_id','>',10)->orderBy('name')->first();
      //  dd($first);

        //firstOrFail
        $first=Product::where('category_id','>',0)->firstOrFail();
       // dd($first);

        //firstWhere
        $firstWhere=Product::firstWhere('price','>',500);
        $firstWhere=Product::firstWhere(['price'=>935,'category_id'=>3]);
      //  dd($firstWhere);

        $category=Product::groupBy('category_id')->get()->count();
        //dd($category);

        //has
        $has=Category::has('products')->get();
       // dd($has);

        //pluck
        $pluck=Product::pluck('price');
        $pluck=Product::pluck('price')->count();
        $pluck=Product::pluck('price')->sum();
        $pluck=Product::where('price','>',1000)->pluck('price');

        foreach ($pluck as $list){
            echo $list." ,";
        }

        $pluck=Product::pluck('price','name');
        // $pluck=Product::pluck('price','id');

        foreach ($pluck as $key=>$item){
            //  dd($key);
            //  dd($item);
        }
        // dd($pluck);

        //isEmpty
        $isEmpty=Product::get();
        if ($isEmpty->isEmpty()){
            echo "No product found";
        }
        else{
            //dd($isEmpty);
        }

        //isNotEmpty
        $isEmpty=Product::get();
        if ($isEmpty->isNotEmpty()){
            echo "No product found";
        }
        else{
           // dd($isEmpty);
        }
    //when
    $when=Product::when(!empty('name'),function ($query){
        return $query->where('category_id',3);
    })->get();
      //  dd($when);

        //whereBetween
        $whereBetween=Product::whereBetween('price',[500,600])->get();
        $whereBetween=Product::whereBetween('price',[500,600])->orwhereBetween('category_id',[15,20])->get();
       // dd($whereBetween);

        //unique
      //  $unique=Product::unique('name')->get(); //not working
        $unique=Product::get()->unique('name');
        $unique=Product::get()->unique('price');
        $unique=Product::get();
      $uni=  $unique->unique(function ($query){
            return $query->name;
        });
        //dd($uni);

        //latest
        $latest=Product::latest()->get();  //sort by created_at
        $latest=Product::latest('name')->get();
       // dd($latest);

        //oldest
        $oldest=Product::oldest()->get();  //sort by created_at
        $oldest=Product::oldest('name')->get();
       // dd($oldest);


        // 24/01/2023

        //sortBy
        $sortBy=Product::get()->sortBy('price')->count();
        $sortBy=Product::get()->sortBy('price');
        $sortBy=Product::get()->sortBy(['price','name']);
       // dd($sortBy);

        //sortByDesc
      //  $sortByDesc=Product::get('name')->sortByDesc(); //not Working
        $sortByDesc=Product::get()->sortByDesc('name');
        $sortByDesc=Product::pluck('price')->sortByDesc('price'); //not working
        $sortByDesc=Product::get('price')->sortByDesc('price'); //not working
       // dd($sortByDesc);

        //sortByAsc Same by sortByDesc

        //put
       /* $put=$request->put('name','asif');
        dd($put);*/

        //only
      //  $only=Product::get()->only('name'); //not working
        $only=Product::all()->only('name'); //not working
        $only=Product::first()->only('name'); //not working
      //  dd($only);

        //value retrieve only first  value
      //  $value=Product::pluck('name')->value(); //not working
        $value=Product::get()->value(['price','name']); //not working
        $value=Product::get()->value('price');
        $value=Product::first()->value('name');
       // dd($value);

        //random after reloading page change the product
        $random=Product::get()->random();
        $random=Product::get()->random(3);  //retrieve 3 data
        $random=Product::get('price')->random(3);  //retrieve 3 data
       // dd($random);

        //join
        $join=DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*','categories.name')
            ->get();
        dd($join);

    }
}
