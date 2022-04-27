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
    <div class="head bg-muted">
        <div class="card-body ">
            <div class="row">
            <div class="col-md-12  d-flex justify-content-between align-items-center">
                  @if(isset($editData))
                  <h5 class="display-5">Edit Slider</h5>
                    @else
                    <h5 class="display-5">Create Slider</h5>
                  @endif
                  <a href="{{route('sliders.view')}}" class="btn btn-warning text-dark"> <i class="fa fa-list"></i> Slider List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-3 pt-3">
        <form action="{{(@$editData)?route('sliders.update',$editData->id):route('sliders.store')}} " method="POST" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="my-input">Sort_Title</label>
                    <input id="my-input" class="form-control" type="text" name="sort_title" placeholder="Enter Your Sort_Title" value="{{@$editData->sort_title}}" required>
                    <font style="color:red">{{($errors->has('sort_title'))?($errors->first('sort_title')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Long_Title</label>
                    <input id="my-input" class="form-control" type="text" name="long_title" placeholder="Enter Your Long_Title Name" value="{{@$editData->long_title}}" required>
                    <font style="color:red">{{($errors->has('long_title'))?($errors->first('long_title')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Image</label>
                  <img src="{{(!empty($editData->image))?url('public/images/slider_images/'.$editData->image):url('public/images/slider_images/not_found_img.png')}}" id="image" style="width:540px;height:200px">
                  <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                </div>
                <div class="form-group">
                <button type="submit" id="button" class="btn btn-success">{{(@$editData)?"Update":"Submit"}} </button>
                </div>
          </form>
        </div>
    </div>




</div>
{{-- card end --}}

  </div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
