@extends('frontend/layouts.master')
@section('content')

<!-- about us section start -->
<section class="about-us">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <h3 style="padding-top: 10px; padding-bottom: 5px; border-bottom:black solid 2px; width:297px;">News and Event Details</h3>
       <p>{{date('d-m-y',strtotime($newsevent->date))}}</p>
       <p>{{$newsevent->long_title}} </p>
     </div>
   </div>
 </div>
</section>
<!-- about us section end -->

@endsection







