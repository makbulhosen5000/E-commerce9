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
                    <h5 class="display-5">Edit Contact</h5>
                    <a href="{{route('users.all')}}" class="btn btn-warning text-dark"><i class="fa fa-plus-circle"></i>Contact List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-3 pt-3">
            <form action="{{route('contacts.update',$data->id)}} " method="POST" enctype="multipart/form-data" >
                @csrf
                @if(Session::has('success'))
                <div class="btn btn-success">{{Session::get('success')}} </div>
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
                <div class="form-group">
                    <label for="my-input">Address</label>
                    <input id="my-input" class="form-control" type="text" name="address" value='{{$data->address}} ' required>
                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Phone</label>
                    <input id="my-input" class="form-control" type="tel" name="phone" value='{{$data->phone}} ' required>
                       <font style="color:red">{{($errors->has('phone'))?($errors->first('phone')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Email</label>
                    <input id="my-input" class="form-control" type="email" name="email" value='{{$data->email}} ' required>
                       <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Facebook</label>
                    <input id="my-input" class="form-control" type="text" name="facebook" value='{{$data->facebook}} ' required>
                       <font style="color:red">{{($errors->has('facebook'))?($errors->first('facebook')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Twitter</label>
                    <input id="my-input" class="form-control" type="text" name="twitter" value='{{$data->twitter}} ' required>
                       <font style="color:red">{{($errors->has('twitter'))?($errors->first('twitter')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Linkedin</label>
                    <input id="my-input" class="form-control" type="text" name="linkedin" value='{{$data->linkedin}} 'required>
                       <font style="color:red">{{($errors->has('linkedin'))?($errors->first('linkedin')):''}} </font>
                </div>
                <div class="form-group">
                    <label for="my-input">Youtube</label>
                    <input id="my-input" class="form-control" type="text" name="youtube" value='{{$data->youtube}} ' required>
                       <font style="color:red">{{($errors->has('youtube'))?($errors->first('youtube')):''}} </font>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Updated</button>
                </div>

            </form>
        </div>
    </div>




</div>
{{-- card end --}}

  </div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
