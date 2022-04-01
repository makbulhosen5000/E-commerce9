<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Session;
use Auth;


class AboutController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=About::all();
        $about=About::count();
        return view('backend.about.about-view', compact('user','about'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.about.create-about');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',

        ]);
       $userData=new About();
       $userData->created_by=Auth::user()->id;
       $userData->description=$request->description;
       $userData->created_by=$request->created_by;
       $userData->updated_by=$request->updated_by;
       $userData->save();
       Session::flash('success','About Created successfully');
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
        $data=About::find($id);
        return view('backend.about.edit-about',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=About::find($id);
        $update->updated_by=Auth::user()->id;
        $update->description=$request->description;
        $update->created_by=$request->created_by;
        $update->updated_by=$request->updated_by;
        $update->save();
        Session::flash('success','About Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $about=About::find($id);
        $about->delete();
       return redirect()->route('about.view');
    }
}
