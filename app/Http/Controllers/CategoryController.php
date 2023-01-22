<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        /*$category=Category::with('products')->get();*/

        if ($request->ajax()) {
            $data = Category::with('products')
                ->when(!empty($request->category), function ($q) {
                        return $q->where('id', request()->category);
                        })
                ->when(!empty($request->products), function ($q) {
                    $q->whereHas('products', function ($sub) {
                        return $sub->where('id', request()->products);
                    });
                        })
                ->get();

            $table= Datatables::of($data);

            $table->editColumn('id', function ($row) {
                    return $row->id ?? '';
                });

            $table->editColumn('Category', function ($row) {
                    return $row->name ? $row->name : '';
                });
            $table->editColumn('product', function ($row) {
                $name='';
                foreach ($row->products as $list){
                   $name .= $list->name.",";
                }
                return $name ?? '';
            });
            $table->addColumn('count', function ($row) {
                $count=count($row->products);
                return $count ?? '';
            });
            $table->editColumn('price', function ($row) {
                $price = 0;
                foreach ($row->products as $list) {
                    $price += $list->price;
                }
                return $price ? $price : '';
            });

            $table->rawColumns(['products']);
            return  $table->make(true);
        }
        $category=Category::get();
        $product=Product::get();
        return view('category.index',compact('category','product'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
