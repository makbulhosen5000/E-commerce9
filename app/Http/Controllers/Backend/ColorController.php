<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;
use App\Models\Color;
use Auth;
use Session;

class ColorController extends Controller
{
      //__category view function is here__//
      public function index()
      {
          $color=Color::all();
          // $catCount=Category::count();
          return view('backend.color.view-color', compact('color'));
      }
  
         //__category create function is here__//
        public function create()
        {
            return view('backend.color.create-color');
        }
  
       //__category store function is here__//
      public function store(ColorRequest $request)
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
          $editColor=Color::find($id);
          return view('backend.color.create-color',compact('editColor'));
      } 
       //__category update function is here__//
      public function update(ColorRequest $request, $id)
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
