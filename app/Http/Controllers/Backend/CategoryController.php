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
     //__category view function is here__//
     public function index()
     {
         $category=Category::all();
         // $catCount=Category::count();
         return view('backend.category.view-category', compact('category'));
     }
 
        //__category create function is here__//
       public function create()
       {
           return view('backend.category.create-category');
       }
 
      //__category store function is here__//
     public function store(CategoryRequest $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|unique:categories,name',
 
         ]);
        $storeCategory=new Category();
        $storeCategory->name=$request->name;
        $storeCategory->created_by=Auth::user()->id;
        $storeCategory->save();
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
         $editCategory=Category::find($id);
         return view('backend.category.create-category',compact('editCategory'));
     }
 
      //__category update function is here__//
     public function update(CategoryRequest $request, $id)
     {
         $updateCategory=Category::find($id);
         $updateCategory->name=$request->name;
         $updateCategory->updated_by=Auth::user()->id;
         $updateCategory->save();
         Session::flash('success','Category Updated successfully');
        return redirect()->back();
     }
 
     //__category delete function is here__//
     public function destroy($id)
     {
        $deleteBrand=Category::find($id);
        $deleteBrand->delete();
       return redirect()->route('categories.view');
     }
}
