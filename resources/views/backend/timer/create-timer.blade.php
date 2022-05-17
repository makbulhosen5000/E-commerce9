<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                  @if(isset($editTimer))
                  <h5 class="display-5">Edit Timer</h5>
                    @else
                    <h5 class="display-5">Create Timer</h5>
                  @endif
                  <a href="{{route('timers.view')}}" class="btn btn-warning text-dark"> <i class="fa fa-list"></i> Timer List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-3 pt-3">
            <form action="{{(@$editTimer)?route('timers.update',$editTimer->id):route('timers.store')}} " method="POST" enctype="multipart/form-data">
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
                    <label for="my-input">Title</label>
                    <input type="text" class="form-control" name="title" id="" value="{{@$editTimer->title}}" type="text" placeholder="Enter Your Title" required>
                    <font style="color:red">{{($errors->has('title'))?($errors->first('title')):''}} </font>
                </div>
                <div class="form-group">
                     <label for="name">Select Date Time <span class="text-danger">*</span></label>
                     <input type="datetime-local" name="date_time" class="form-control"/>
                     <font style="color:red">{{($errors->has('date_time'))?($errors->first('date_time')):''}} </font>
                  </div>
                  <div class="form-group">
                     <label for="author">Status<span class="text-danger">*</span></label>
                     <select class="form-control" name="timer_status">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                     </select>
                  </div>
                <div class="form-group">
                  <button type="submit" id="button" class="btn btn-success">{{(@$editTimer)?"Update":"Submit"}} </button>
                </div>

            </form>
        </div>
    </div>

</div>
{{-- card end --}}


  </div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
