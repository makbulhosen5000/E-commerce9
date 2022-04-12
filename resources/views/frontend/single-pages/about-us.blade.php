@extends('frontend/layouts.master')
@section('content')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0">
			About Us
		</h2>
	</section>	
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







