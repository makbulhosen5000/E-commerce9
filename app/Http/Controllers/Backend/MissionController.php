<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission;
use Session;
use Auth;


class MissionController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=Mission::all();
        return view('backend.mission.mission-view', compact('user'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.mission.mission-create');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'title' => 'required',
        ]);
       $userData=new Mission();
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
       Session::flash('success','Mission Created successfully');
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
        $data=Mission::find($id);
        return view('backend.mission.edit-mission',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Mission::find($id);
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
        Session::flash('success','Mission Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $slider=Mission::find($id);
        $slider->delete();
       return redirect()->route('missions.view');
    }
}
