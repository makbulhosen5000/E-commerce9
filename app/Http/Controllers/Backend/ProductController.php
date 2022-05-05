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
use Session;

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
          $data['categories']=Category::all();
          $data['brands']=Brand::all();
          $data['colors']=Color::all();
          $data['sizes']=Size::all();
          return view('backend.product.create-product',$data);
      }

     //__category store function is here__//
   //Store function is here..........................
   public function store(Request $request)
   {
       DB::transaction(function () use($request) {
           $validatedData = $request->validate([
               'name' => 'required|unique:products,name',
               'brand_id' => 'required',
               'price' => 'required',

           ]);
       });

      $storeData=new Product();
      $storeData->category_id=$request->category_id;
      $storeData->brand_id=$request->brand_id;
      $storeData->name=$request->name;
      $storeData->slug=str_slug($request->name);
      $storeData->short_desc=$request->short_desc;
      $storeData->long_desc=$request->long_desc;
      $storeData->price=$request->price;
      $img=$request->file('image');
      if($img){
          $imgName=date('YmdHi').$img->getClientOriginalName();
          $img->move('public/images/product_images/',$imgName);
          $storeData['image']=$imgName;
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
        $data['editData']=Product::find($id);
        $data['categories']=Category::all();
        $data['brands']=Brand::all();
        $data['colors']=Color::all();
        $data['sizes']=Size::all();
        $data['color_array'] = ProductColor::select('color_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
        $data['size_array'] = ProductSize::select('size_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
        return view('backend.product.create-product',$data);
    } 
     //__category update function is here__//
    public function update(ProductRequest $request, $id)
    {
        DB::transaction(function () use($request,$id) {
            $validatedData = $request->validate([
                'size_id' => 'required',
 
            ]);
        });
 
       $updateData=Product::find($id);
       $updateData->category_id=$request->category_id;
       $updateData->brand_id=$request->brand_id;
       $updateData->name=$request->name;
       $updateData->slug=str_slug($request->name);
       $updateData->short_desc=$request->short_desc;
       $updateData->long_desc=$request->long_desc;
       $updateData->price=$request->price;
       $img=$request->file('image');
       if($img){
           $imgName=date('YmdHi').$img->getClientOriginalName();
           $img->move('public/images/product_images/',$imgName);
           if(file_exists('public/images/product_images/'.$updateData->image)AND ! empty($updateData->image))
           {
            unlink('public/images/product_images/'.$updateData->image);
           }
           $updateData['image']=$imgName;
       }
        if($updateData->save()){
            $files=$request->sub_image;
            if(!empty($files)){
                $subimage=ProductSubImage::where('product_id',$id)->get()->toArray();
                foreach($subimage as $value){
                    if(!empty($value)){
                        unlink('public/images/product_sub_images/'.$value['sub_image']);
                    }
                }
                ProductSubImage::where('product_id',$id)->delete();
            }
                if(!empty($files)){
                    foreach($files as $file){
                $imgName=date('YmdHi').$file->getClientOriginalName();
                $file->move('public/images/product_sub_images',$imgName);
                $subimage['sub_image']=$imgName;
                $subimage=new ProductSubImage();
                $subimage->product_id=$updateData->id;
                $subimage->sub_image=$imgName;
                $subimage->save();
                }
            }
            //__ color table data update __//
            $colors=$request->color_id;
            if(!empty($colors)){
                ProductColor::where('product_id',$id)->delete();  
            }
            if(!empty($colors)){
                foreach($colors as $color){
                    $myColor=new ProductColor();
                    $myColor->product_id=$updateData->id;
                    $myColor->color_id=$color;
                    $myColor->save();
                }
            }
             //__ size table data update __//
            $sizes=$request->size_id;
            if(!empty($sizes)){
                ProductSize::where('product_id',$id)->delete();  
            }
            if(!empty($sizes)){
                foreach($sizes as $size){
                    $mySize=new ProductSize();
                    $mySize->product_id=$updateData->id;
                    $mySize->size_id=$size;
                    $mySize->save();
                }
            }
       }else{
           return redirect()->back()->with('error','Data Not Updated');
       }
 
       Session::flash('success','Product Updated Successfully');
       return redirect()->back();
    }
    
     //__ Product Details function is here __//
    public function details($id){
        $productDetails=Product::find($id);
        return view('backend.product.details-product',compact('productDetails'));
    }
    //__ Product delete function is here __//
    public function destroy(Request $request, $id)
    { 
       $product=Product::find($request->id);
       if(file_exists('public/images/product_images/'.$product->image)AND ! empty($product->image))
       {
        unlink('public/images/product_images/'.$product->image);
       }
       $subImage = ProductSubImage::where('product_id',$product->id)->get()->toArray();
       if(!empty($subImage)){
           foreach($subImage as $value){
               if(!empty($value)){
                unlink('public/images/product_sub_images/'.$value['sub_image']);
               }
           }
       }
       ProductSubImage::where('product_id',$product->id)->delete();
       ProductColor::where('product_id',$product->id)->delete();
       ProductSize::where('product_id',$product->id)->delete();
       $product->delete();
       return redirect()->route('products.view')->with('success',"Product Deleted Successfully");
    }

}
