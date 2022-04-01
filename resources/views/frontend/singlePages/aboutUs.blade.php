@extends('frontend/layouts.master')
@section('content')

<!-- about us section start -->
<section class="about-us">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <h3 style="padding-top: 10px; padding-bottom: 5px; border-bottom:black solid 2px; width:119px;">About Us</h3>
       <p>{{$about_us->description}} </p>
     </div>
   </div>
 </div>
</section>
<!-- about us section end -->

@endsection







