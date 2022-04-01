<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Service;
use Session;
use Auth;


class ServiceController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=Service::all();
        return view('backend.service.service-view', compact('user'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.service.service-create');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sort_title' => 'required',
            'long_title' => 'required',
        ]);
       $userData=new Service();
       $userData->created_by=Auth::user()->id;
       $userData->sort_title=$request->sort_title;
       $userData->long_title=$request->long_title;
       $userData->created_by=$request->created_by;
       $userData->updated_by=$request->updated_by;
       $userData->save();
       Session::flash('success','Service Created successfully');
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
        $data=Service::find($id);
        return view('backend.service.edit-service',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Service::find($id);
        $update->updated_by=Auth::user()->id;
        $update->sort_title=$request->sort_title;
        $update->long_title=$request->long_title;
        $update->save();
        Session::flash('success','Service Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $service=Service::find($id);
        $service->delete();
       return redirect()->route('services.view');
    }
}
