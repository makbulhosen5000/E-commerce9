<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Session;
use Auth;


class LogoController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=Logo::all();
        $logo=Logo::count();
        return view('backend.logo.logo-view', compact('user','logo') );
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.logo.logo-create');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
        ]);
       $userData=new Logo();
       $userData->created_by=Auth::user()->id;
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
       Session::flash('success','Logo Created successfully');
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
        $data=Logo::find($id);
        return view('backend.logo.edit-logo',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Logo::find($id);
        $update->updated_by=Auth::user()->id;
        $update->image=$request->image;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $update->image=$myImage;
        }
        $update->save();
        Session::flash('success','Logo Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $data=Logo::find($id);
        $data->delete();
       return redirect()->route('users.all');
    }
}
