@extends('backend.layouts.admin-master')
@section('content')
<!-- Content Wrapper. Contains page content start -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-muted">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-dark" >Home</a></li>
              <li class="breadcrumb-item active text-dark">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card">
  <div class="container">
    <div class="head bg-muted">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12  d-flex justify-content-between align-items-center">
                  @if(isset($editData))
                  <h5 class="display-5">Edit Product</h5>
                    @else
                    <h5 class="display-5">Create Product</h5>
                  @endif
                  <a href="{{route('products.view')}}" class="btn btn-warning text-dark"> <i class="fa fa-list"></i> Product List</a>
                </div>
            </div>
        </div>
    </div>

            <form action="{{(@$editData)?route('products.update',$editData->id):route('products.store')}} " method="POST" enctype="multipart/form-data">
                @csrf
                @if(Session::has('error'))
                <div class="btn btn-danger">{{Session::get('error')}} </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
      
                <!-- row start -->
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="my-input">Category</label>
                      <select name="category_id" id="" class="form-control" required>
                        <option value="" selected>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{(@$editData->category_id == $category->id)?"selected":""}} >{{$category->name}} </option>
                        @endforeach
                      </select>
                      <font style="color:red">{{($errors->has('category_id'))?($errors->first('category_id')):''}} </font>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="my-input">Brand</label>
                      <select name="brand_id" id="" class="form-control" required>
                        <option value="" selected>Select Brand</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{(@$editData->brand_id==$brand->id)?"selected":""}} >{{$brand->name}} </option>
                        @endforeach
                      </select>
                      <font style="color:red">{{($errors->has('brand_id'))?($errors->first('brand_id')):''}} </font>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="my-input">Size</label>
                      <select name="size_id[]" id="" class="form-control select2" multiple required>
                        @foreach($sizes as $size)
                        <option value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id],$size_array))?"selected":""}} >{{$size->name}} </option>
                        @endforeach
                      </select>
                      <font style="color:red">{{($errors->has('size_id'))?($errors->first('size_id')):''}} </font>
                    </div>
                  </div>
                </div>
                <!-- row end -->
                <!-- row start -->
                <div class="row"> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="my-input">Color</label>
                      <select name="color_id[]" id="" class="form-control select2" multiple required>
                        @foreach($colors as $color)
                        <option value="{{$color->id}}" {{(@in_array(['color_id'=>$color->id],$color_array))?"selected":""}} >{{$color->name}} </option>
                        @endforeach
                      </select>
                      <font style="color:red">{{($errors->has('color_id'))?($errors->first('color_id')):''}} </font>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="my-input">Product Name</label>
                        <input type="text" class="form-control" name="name" id="" value="{{@$editData->name}}" type="text" placeholder="Enter Product Name" required>
                        <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}} </font>
                      </div>
                  </div>
                  <div class="col-md-4">
                        <div class="form-group">
                        <label>Product Price</label>
                        <input class="form-control-sm" type="number" style="width: 100%;" name="price" value="{{@$editData->price}}" required />
                        <font style="color:red">{{($errors->has('price'))?($errors->first('price')):''}} </font>
                        </div>
                     </div>
                </div>
                <!-- row end -->
                <!-- row start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Short Description</label>
                             <textarea class="form-control" name="short_desc" id="" placeholder="Enter Your Short Description" placeholder="Please Enter Short Description for product" required>{{$editData->short_desc}}</textarea>
                            <font style="color:red">{{($errors->has('short_desc'))?($errors->first('short_desc')):''}} </font>
                        </div>
                    </div>
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Long Description</label>
                             <textarea class="form-control" name="long_desc" id="" rows="6" placeholder="Enter Your Short Description" placeholder="Please Enter Short Description for product">{{$editData->long_desc}}</textarea>
                            <font style="color:red">{{($errors->has('long_desc'))?($errors->first('long_desc')):''}} </font>
                        </div>
                    </div>
                </div>
                <!-- row end -->
                 <!-- row start -->
                 <div class="row">
                 
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>Image</label>
                        <img src="{{(!empty($editData->image))?url('public/images/product_images/'.$editData->image):url('public/images/not_found_img.png')}}" id="image" style="width:400px;height:300px">
                        <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>Sub Image</label>
                        <input id="my-input" class="form-control" type="file" name="sub_image[]" multiple>
                        </div>
                     </div>
                </div>
                <!-- row end -->
              <div class="form-group">
                <button type="submit" id="button" class="btn btn-success">{{(@$editData)?"Update":"Submit"}} </button>
              </div>

            </form>

    </div>
    <!-- container end -->
  </div>
  {{-- card end --}}


</div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
