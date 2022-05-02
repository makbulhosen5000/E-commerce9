@extends('backend.layouts.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content start -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-light">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-dark">Home</a></li>
              <li class="breadcrumb-item active text-dark">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card">
    <div class="head bg-muted">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12  d-flex justify-content-between align-items-center">
                    <h5 class="display-5">Product Details</h5>
                    {{-- @if($category<1) --}}
                  <a href="{{route('products.view')}}" class="btn btn-warning text-dark"><i class="fa fa-list"></i>View Product</a>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        {{-- table start --}}

        <tbody>
            <tr>
                <td width="25%">Category Name</td>
                <td>{{$productDetails->category->name}}</td>
            </tr>
            <tr>
                <td width="25%">Brand Name</td>
                <td>{{$productDetails->brand->name}}</td>
            </tr>
            <tr>
                <td width="25%">Product Name</td>
                <td>{{$productDetails->name}}</td>
            </tr>
            <tr>
                <td width="25%">Product Price</td>
                <td>{{$productDetails->price}}</td>
            </tr>
            <tr>
                <td width="25%">Product Short-Description</td>
                <td>{{$productDetails->short_desc}}</td>
            </tr>
            <tr>
                <td width="25%">Product Long Description</td>
                <td>{{$productDetails->long_desc}}</td>
            </tr>
            <tr>
                <td width="25%" class="pt-5">Product Image</td>
                <td> <img src="{{(!empty($productDetails->image))?url('public/images/product_images/'.$productDetails->image):url('public/images/not_found_img.png')}}" id="image" width="160px";height='160px'></td>
            </tr>
            <tr>
                <td width="25%">Product Color</td>
                <td>
                     @php
                         $colors=App\Models\ProductColor::where('product_id',$productDetails->id)->get();
                     @endphp
                    @foreach ($colors as $c)
                        {{$c->color->name}},
                    @endforeach
                </td>
            </tr>
            <tr>
                <td width="25%">Product Size</td>
                <td>
                     @php
                         $sizes=App\Models\ProductSize::where('product_id',$productDetails->id)->get();
                     @endphp
                    @foreach ($sizes as $s)
                        {{$s->size->name}},
                    @endforeach
                </td>
            </tr>
            <tr>
                <td width="25%" class="pt-5">Product Sub-Image</td>
                <td>
                     @php
                         $ProductSubImages=App\Models\ProductSubImage::where('product_id',$productDetails->id)->get();
                     @endphp
                    @foreach ($ProductSubImages as $ProductSubImage)
                    <img src="{{url('public/images/product_sub_images/'.$ProductSubImage->sub_image)}}" width="160px";height='160px' alt="">
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    {{-- table end --}}



</div>
{{-- card end --}}

  </div>
 <!-- Content Wrapper. Contains page content end-->
@endsection

