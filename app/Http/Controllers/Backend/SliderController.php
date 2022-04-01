<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Auth;


class SliderController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $user=Slider::all();
        return view('backend.slider.slider-view', compact('user'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.slider.slider-create');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'sort_title' => 'required',
            'long_title' => 'required',
        ]);
       $userData=new Slider();
       $userData->created_by=Auth::user()->id;
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
       Session::flash('success','Slider Created successfully');
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
        $data=slider::find($id);
        return view('backend.slider.edit-slider',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Slider::find($id);
        $update->updated_by=Auth::user()->id;
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
        Session::flash('success','Slider Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $slider=Slider::find($id);
        $slider->delete();
       return redirect()->route('sliders.view');
    }
}
