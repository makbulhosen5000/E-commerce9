<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Models\Size;
use Auth;
use Session;

class SizeController extends Controller
{
      //__category view function is here__//
      public function index()
      {
          $size=Size::all();
          // $catCount=Category::count();
          return view('backend.size.view-size', compact('size'));
      }
  
         //__category create function is here__//
        public function create()
        {
            return view('backend.size.create-size');
        }
  
       //__category store function is here__//
      public function store(SizeRequest $request)
      {
          $validatedData = $request->validate([
              'name' => 'required|unique:Sizes,name',
  
          ]);
         $storeSize=new Size();
         $storeSize->name=$request->name;
         $storeSize->created_by=Auth::user()->id;
         $storeSize->save();
         Session::flash('success','Size Created successfully');
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
          $editSize=Size::find($id);
          return view('backend.size.create-size',compact('editSize'));
      } 
       //__category update function is here__//
      public function update(SizeController $request, $id)
      {
          $updateSize=Size::find($id);
          $updateSize->name=$request->name;
          $updateSize->updated_by=Auth::user()->id;
          $updateSize->save();
          Session::flash('success','Size Updated successfully');
         return redirect()->back();
      }
  
      //__category delete function is here__//
      public function destroy($id)
      {
         $deleteSize=Size::find($id);
         $deleteSize->delete();
        return redirect()->route('Sizes.view');
      }
}
