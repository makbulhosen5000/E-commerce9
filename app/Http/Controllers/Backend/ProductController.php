<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use DB;
use Auth;
class ProductController extends Controller
{
    //__category view function is here__//
    public function index()
    {
        $product=Product::all();
        // $catCount=Category::count();
        return view('backend.product.view-product', compact('product'));
    }

       //__category create function is here__//
      public function create()
      {
          $data['categorys']=Category::all();
          $data['brands']=Brand::all();
          $data['colors']=Color::all();
          $data['sizes']=Size::all();
          return view('backend.product.create-product',$data);
      }

     //__category store function is here__//
    public function store(ProductRequest $request)
    {
        DB::transaction(function ($request) {
            $validatedData = $request->validate([
                'name' => 'required|unique:products,name',
                'color_id' => 'required',
                'size_id' => 'required'
            ]);
        });
       
       $storeProduct=new Color();
       $storeProduct->category_id=$request->category_id;
       $storeProduct->brand_id=$request->brand_id;
       $storeProduct->size_id=$request->size_id;
       $storeProduct->color_id=$request->color_id;
       $storeProduct->name=$request->name;
       $storeProduct->short_desc=$request->short_desc;
       $storeProduct->long_desc=$request->long_desc;
       $storeProduct->created_by=Auth::user()->id;
       $storeProduct->save();
       Session::flash('success','Product Created successfully');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    //edit function is here.......................
    public function edit($id)
    {
        $editProduct=Product::find($id);
        return view('backend.product.create-product',compact('editProduct'));
    } 
     //__category update function is here__//
    public function update(ProductRequest $request, $id)
    {
        $updateColor=Color::find($id);
        $updateColor->name=$request->name;
        $updateColor->updated_by=Auth::user()->id;
        $updateColor->save();
        Session::flash('success','Color Updated successfully');
       return redirect()->back();
    }

    //__category delete function is here__//
    //delete function is here...........................
    public function destroy(Request $request, $id)
    { 
       $delete=Product::find($request->id);
       if(file_exists('public/image/product_images/'.$delete->image)AND ! empty($delete->image))
       {
        unlink('public/image/product_images/'.$delete->image);
       }
       $delete->delete();
       return redirect()->route('sliders.view');
    }
}
