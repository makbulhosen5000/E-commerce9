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
                  @if(isset($editProduct))
                  <h5 class="display-5">Edit Product</h5>
                    @else
                    <h5 class="display-5">Create Product</h5>
                  @endif
                  <a href="{{route('products.view')}}" class="btn btn-warning text-dark"> <i class="fa fa-list"></i> Product List</a>
                </div>
            </div>
        </div>
    </div>

            <form action="{{(@$editProduct)?route('products.update',$editProduct->id):route('products.store')}} " method="POST" enctype="multipart/form-data">
                @csrf
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
                      <select name="category_id" id="" class="form-control"required>
                        <option value="" selected>Select Category</option>
                        @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}} </option>
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
                        <option value="{{$brand->id}}">{{$brand->name}} </option>
                        @endforeach
                      </select>
                      <font style="color:red">{{($errors->has('brand_id'))?($errors->first('brand_id')):''}} </font>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="my-input">Size</label>
                      <select name="size_id" id="" class="form-control" required>
                        <option value="" selected>Select Size</option>
                        @foreach($sizes as $size)
                        <option value="{{$size->id}}">{{$size->name}} </option>
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
                        <option value="{{$color->id}}">{{$color->name}} </option>
                        @endforeach
                      </select>
                      <font style="color:red">{{($errors->has('color_id'))?($errors->first('color_id')):''}} </font>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="my-input">Size</label>
                      <select name="size_id[]" id="" class="form-control select2" multiple required>
                        @foreach($sizes as $size)
                        <option value="{{$size->id}}">{{$size->name}} </option>
                        @endforeach
                      </select>
                      <font style="color:red">{{($errors->has('size_id'))?($errors->first('size_id')):''}} </font>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="my-input">Product Name</label>
                        <input type="text" class="form-control" name="name" id="" value="{{@$editProduct->name}}" type="text" placeholder="Enter Product Name" required>
                        <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}} </font>
                      </div>
                  </div>
                </div>
                <!-- row end -->
                <!-- row start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Short Description</label>
                             <textarea class="form-control" name="short_desc" id="" placeholder="Enter Your Short Description" placeholder="Please Enter Short Description for product" required></textarea>
                            <font style="color:red">{{($errors->has('short_desc'))?($errors->first('short_desc')):''}} </font>
                        </div>
                    </div>
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Long Description</label>
                             <textarea class="form-control" name="long_desc" id="" rows="6" placeholder="Enter Your Short Description" placeholder="Please Enter Short Description for product" required></textarea>
                            <font style="color:red">{{($errors->has('short_desc'))?($errors->first('short_desc')):''}} </font>
                        </div>
                    </div>
                </div>
                <!-- row end -->
                 <!-- row start -->
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Product Price</label>
                        <input class="form-control-sm" type="number" style="width: 100%;" name="price" value="{{@$productsEdit->price}}" required />
                        <font style="color:red">{{($errors->has('price'))?($errors->first('price')):''}} </font>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>Image</label>
                        <img src="{{(!empty($productsEdit->image))?url('public/upload/images/'.$productsEdit->image):url('public/upload/images/not_found_img.jpg')}}" id="image" style="width:445px;height:200px">
                        <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Sub Image</label>
                        <input id="my-input" class="form-control" type="file" name="sub_image[]" multiple>
                        </div>
                     </div>
                </div>
                <!-- row end -->
              <div class="form-group">
                <button type="submit" id="button" class="btn btn-success">{{(@$editProduct)?"Update":"Submit"}} </button>
              </div>

            </form>

    </div>
    <!-- container end -->
  </div>
  {{-- card end --}}


</div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
