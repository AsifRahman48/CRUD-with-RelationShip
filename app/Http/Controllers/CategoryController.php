<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\image;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use image;

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

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'discount_sponsor_show';
                $editGate = 'discount_sponsor_edit';
                $deleteGate = 'discount_sponsor_delete';
                $crudRoutePart = 'categories';

                return view('category.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

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

            $table->editColumn('image', function ($row) {
                return view('category.image', compact('row'));
            });

            $table->rawColumns(['actions','products']);
            return  $table->make(true);
        }
        $category=Category::get();
        $product=Product::get();
        return view('category.index',compact('category','product'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category=Category::create([
            //  'image' => $path,
              'name' => $request->name,
          ]);

        $path = $this->singleFileUpload($request->image, 'category');
        $category->image=$path;

      $category->save();
      

        return redirect()->route('categories.index')->with(['message' => 'Create Successfully']);
    }

    public function show($id)
    {
        //
    }
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
             'name' => $request->name,
         ]);

        if ($request->hasFile('image')) {
            $request->image = $this->singleFileUpload($request->image, "category", $category->image);
        }

        $category->image=$request->image ?? $category->image;

        $category->save();

        return redirect()->route('categories.index')->with(['message' => 'Successfully Updated.']);
    
    }
    public function destroy(Category $category)
    {
        if (!is_null($category->image)) {
            $this->deleteFile($category->image);
        }
        $category->delete();

        return redirect()->route('categories.index')->with(['message' => 'Successfully deleted.']);
    }
}
