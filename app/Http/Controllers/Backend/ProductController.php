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
        $validatedData = $request->validate([
            'name' => 'required|unique:colors,name',

        ]);
       $storeColor=new Color();
       $storeColor->name=$request->name;
       $storeColor->created_by=Auth::user()->id;
       $storeColor->save();
       Session::flash('success','Color Created successfully');
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
    public function destroy($id)
    {
       $deleteColor=Color::find($id);
       $deleteColor->delete();
      return redirect()->route('colors.view');
    }
}
