@extends('backend.layouts.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content start -->
<div class="content-wrapper">
    <!-- Content Header start(Page header) -->
    <div class="content-header bg-light">
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
    <!-- /.content-header end -->
     <!-- card start -->
      <div class="card">
          <div class="head bg-muted">
              <div class="card-body ">
                  <div class="row">
                      <div class="col-md-12  d-flex justify-content-between align-items-center">
                          <h5 class="display-5">Brand List</h5>
                        <a href="{{route('brands.create')}}" class="btn btn-warning text-dark"><i class="fa fa-plus-circle"></i>Create Brand</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
          <!-- /.card end -->

          <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Brand</th>
                                  <th>Action</th>

                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($brand as $key=> $item)
                              @php
                              $count_brand= App\Models\Product::where('brand_id',$item->id)->count();
                              @endphp
                              <tr class="{{$item->id}}">
                                  <td>{{$key+1}}</td>
                                  <td>{{$item->name}}</td>


                                  <td>
                                      <a href="{{route('brands.edit',$item->id)}}" class="btn btn-warning" title="Edit"><i class="fa fa-user-edit"></i></a>
                                      @if($count_brand<1)
                                      <a href="{{route('brands.destroy',$item->id)}} " id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                      @endif
                                  </td>
                              </tr>
                              @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
            </div>
        <!-- card end -->
</div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
