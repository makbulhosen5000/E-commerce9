<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use App\Models\Size;
use Illuminate\Http\Request;
use DB;
use Auth;
class ProductController extends Controller
{
    //__category view function is here__//
    public function index()
    {
        $product=Product::all();
        // $catCount=Category::count();
        return view('backend.product.view-product', compact('product'));
    }

       //__category create function is here__//
      public function create()
      {
          $data['categorys']=Category::all();
          $data['brands']=Brand::all();
          $data['colors']=Color::all();
          $data['sizes']=Size::all();
          return view('backend.product.create-product',$data);
      }

     //__category store function is here__//
    public function store(ProductRequest $request)
    {
        DB::transaction(function ($request) {
            $validatedData = $request->validate([
                'name' => 'required|unique:products,name',
                'color_id' => 'required',
                'size_id' => 'required',
                'price' => 'required',
                'image' => 'required'
            ]);
        });
       
       $storeData=new Color();
       $storeData->category_id=$request->category_id;
       $storeData->brand_id=$request->brand_id;
       $storeData->size_id=$request->size_id;
       $storeData->color_id=$request->color_id;
       $storeData->name=$request->name;
       $storeData->price=$request->price;
       $storeData->short_desc=$request->short_desc;
       $storeData->long_desc=$request->long_desc;
       $storeData->created_by=Auth::user()->id;
       if($request->hasFile('image')){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $myImage=time().'.'.$extension;
        $file->move('public/images/product_images/',$myImage);
        $storeData->image=$myImage;
    }
      if($storeData->save()){
            $files=$request->sub_image;
            if(!empty($files)){
                foreach($files as $file){
                    $imgName=date('YmdHi').$file->getClientOriginalName();
                    $file->move('public/images/product_sub_images',$imgName);
                    $subimage['sub_image']=$imgName;
                    $subimage=new ProductSubImage();
                    $subimage->product_id=$storeData->id;
                    $subimage->sub_image=$imgName;
                    $subimage->save();
                }
            }
            $colors=$request->color_id;
            if(!empty($colors)){
                foreach($colors as $color){
                    $myColor=new ProductColor();
                    $myColor->product_id=$storeData->id;
                    $myColor->color_id=$color;
                    $myColor->save();
                }
            }
            $sizes=$request->size_id;
            if(!empty($sizes)){
                foreach($sizes as $size){
                    $mySize=new ProductSize();
                    $mySize->product_id=$storeData->id;
                    $mySize->size_id=$size;
                    $mySize->save();
                }
            }
       }else{
           return redirect()->back()->with('error','Data Not Sent');
       }
       Session::flash('success','Product Created successfully');
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
        $editProduct=Product::find($id);
        return view('backend.product.create-product',compact('editProduct'));
    } 
     //__category update function is here__//
    public function update(ProductRequest $request, $id)
    {
        $updateData=Color::find($id);
        $updateData->category_id=$request->category_id;
        $updateData->brand_id=$request->brand_id;
        $updateData->size_id=$request->size_id;
        $updateData->color_id=$request->color_id;
        $updateData->name=$request->name;
        $updateData->price=$request->price;
        $updateData->short_desc=$request->short_desc;
        $updateData->long_desc=$request->long_desc;
        $updateData->created_by=Auth::user()->id;
        if($request->hasFile('image')){
         $file=$request->file('image');
         $extension=$file->getClientOriginalExtension();
         $myImage=time().'.'.$extension;
         $file->move('public/images/product_images/',$myImage);
         $updateData->image=$myImage;
     }
        $updateData->save();
        Session::flash('success','Product Updated successfully');
       return redirect()->back();
    }

    //__category delete function is here__//
    //delete function is here...........................
    public function destroy(Request $request, $id)
    { 
       $delete=Product::find($request->id);
       if(file_exists('public/images/product_images/'.$delete->image)AND ! empty($delete->image))
       {
        unlink('public/images/product_images/'.$delete->image);
       }
       $delete->delete();
       return redirect()->route('sliders.view');
    }
}
