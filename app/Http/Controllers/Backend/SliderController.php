<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Auth;


class SliderController extends Controller
{
    //__ view function is here __//
    public function index()
    {
        $allData=Slider::all();
        return view('backend.slider.slider-view', compact('allData'));
    }

      //__ Create function is here __//
      public function create()
      {
          return view('backend.slider.slider-create');
      }

     //__ Store function is here __//
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'image' => 'required',
             'sort_title' => 'required',
             'long_title' => 'required',
         ]);
        $storeData=new Slider();
        $storeData->created_by=Auth::user()->id;
        $storeData->sort_title=$request->sort_title;
        $storeData->long_title=$request->long_title;
        $storeData->created_by=$request->created_by;
        $storeData->updated_by=$request->updated_by;
         if($request->hasFile('image')){
             $file=$request->file('image');
             $extension=$file->getClientOriginalExtension();
             $newImage=time().'.'.$extension;
             $file->move('public/images/slider_images/',$newImage);
             $storeData->image=$newImage;
         }else{
             return $request;
             $storeData->image='';
         }
        $storeData->save();
        Session::flash('success','Slider Created successfully');
        return redirect()->back();
     }

    public function show($id)
    {
        //
    }
    //__ edit function is here __//
    public function edit($id)
    {
        $editData=slider::find($id);
        return view('backend.slider.slider-create',compact('editData'));
        // edit
    }

    //__ update function is here __//
    public function update(Request $request, $id)
    {
        $updateData=Slider::find($id);
        $updateData->updated_by=Auth::user()->id;
        $updateData->sort_title=$request->sort_title;
        $updateData->long_title=$request->long_title;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('public/images/slider_images/',$myImage);
            $updateData->image=$myImage;
        }
        $updateData->save();
        Session::flash('success','Slider Updated successfully');
       return redirect()->back();
    }

    //__delete function is here __//
    public function destroy(Request $request, $id)
    { 
       $deleteData=Slider::find($request->id);
       if(file_exists('public/images/slider_images/'.$deleteData->image)AND ! empty($slider->image))
       {
        unlink('public/images/slider_images/'.$deleteData->image);
       }
       $deleteData->delete();
       return redirect()->route('sliders.view');
    }
}
