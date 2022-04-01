<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vision;
use Session;
use Auth;


class VisionController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=Vision::all();
        return view('backend.vision.vision-view', compact('user'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.vision.vision-create');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'title' => 'required',
        ]);
       $userData=new Vision();
       $userData->created_by=Auth::user()->id;
       $userData->title=$request->title;
       $userData->created_by=$request->created_by;
       $userData->updated_by=$request->updated_by;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('upload/user_images/',$newImage);
            $userData->image=$newImage;
        }else{
            return $request;
            $userData->image='';
        }
       $userData->save();
       Session::flash('success','Vision Created successfully');
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
        $data=Vision::find($id);
        return view('backend.vision.edit-vision',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Vision::find($id);
        $update->updated_by=Auth::user()->id;
        $update->title=$request->title;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $update->image=$myImage;
        }
        $update->save();
        Session::flash('success','Vision Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $slider=Vision::find($id);
        $slider->delete();
       return redirect()->route('visions.view');
    }
}
