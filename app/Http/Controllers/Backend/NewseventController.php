<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsevent;
use Session;
use Auth;


class NewseventController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=Newsevent::all();
        return view('backend.newsevent.newsevent-view', compact('user'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.newsevent.newsevent-create');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'sort_title' => 'required',
            'long_title' => 'required',
            'image' => 'required',
        ]);
       $userData=new Newsevent();
       $userData->created_by=Auth::user()->id;
       $userData->date=$request->date;
       $userData->sort_title=$request->sort_title;
       $userData->long_title=$request->long_title;
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
       Session::flash('success','Newsevent Created successfully');
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
        $data=Newsevent::find($id);
        return view('backend.newsevent.edit-newsevent',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Newsevent::find($id);
        $update->updated_by=Auth::user()->id;
        $update->date=date('y-m-d',strtotime($request->date));
        $update->sort_title=$request->sort_title;
        $update->long_title=$request->long_title;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $update->image=$myImage;
        }
        $update->save();
        Session::flash('success','Newsevent Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $newsevent=Newsevent::find($id);
        $newsevent->delete();
       return redirect()->route('newsevents.view');
    }
}
