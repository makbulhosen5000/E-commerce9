<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Auth;
use Session;

class BrandController extends Controller
{
      //__category view function is here__//
      public function index()
      {
          $brand=Brand::all();
          // $catCount=Category::count();
          return view('backend.brand.view-brand', compact('brand'));
      }
  
         //__category create function is here__//
        public function create()
        {
            return view('backend.brand.create-brand');
        }
  
       //__category store function is here__//
      public function store(BrandRequest $request)
      {
          $validatedData = $request->validate([
              'name' => 'required|unique:brands,name',
  
          ]);
         $storeBrand=new Brand();
         $storeBrand->name=$request->name;
         $storeBrand->created_by=Auth::user()->id;
         $storeBrand->save();
         Session::flash('success','Brand Created successfully');
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
          $editBrand=Brand::find($id);
          return view('backend.brand.create-brand',compact('editBrand'));
      } 
       //__category update function is here__//
      public function update(BrandRequest $request, $id)
      {
          $updateBrand=Brand::find($id);
          $updateBrand->name=$request->name;
          $updateBrand->updated_by=Auth::user()->id;
          $updateBrand->save();
          Session::flash('success','Brand Updated successfully');
         return redirect()->back();
      }
  
      //__category delete function is here__//
      public function destroy($id)
      {
         $deleteBrand=Brand::find($id);
         $deleteBrand->delete();
        return redirect()->route('brands.view');
      }
}
