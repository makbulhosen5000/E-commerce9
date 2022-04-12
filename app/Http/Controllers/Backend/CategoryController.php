<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth; 
use Session;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
     //view function is here......................................
     public function index()
     {
         $category=Category::all();
         // $catCount=Category::count();
         return view('backend.category.view-category', compact('category'));
     }
 
       //Create function is here......................................
       public function create()
       {
           return view('backend.category.create-category');
       }
 
     //Store function is here..........................
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|unique:categories,name',
 
         ]);
        $userData=new Category();
        $userData->name=$request->name;
        $userData->created_by=Auth::user()->id;
        $userData->save();
        Session::flash('success','Category Created successfully');
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
         $editData=Category::find($id);
         return view('backend.category.create-category',compact('editData'));
     }
 
     //update function is here.......................
     public function update(Request $request, $id)
     {
         $update=Category::find($id);
         $update->name=$request->name;
         $update->updated_by=Auth::user()->id;
         $update->save();
         Session::flash('success','Category Updated successfully');
        return redirect()->back();
     }
 
     //__delete function is here__//
     public function destroy($id)
     {
        $categoryDelete=Category::find($id);
        $categoryDelete->delete();
       return redirect()->route('categories.view');
     }
}
