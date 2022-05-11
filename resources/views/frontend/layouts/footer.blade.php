 <!-- footer start form here -->
  	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-6 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contact Us
					</h4>
					<p class="stext-107 cl7 hov-cl1 trans-04" style="font-size: 15px;">
	                    Address: {{$contacts->address}}
						<br>
						Cell: {{$contacts->phone}}
						<br>
						Email: {{$contacts->email}}
	                </p>
				</div>

				<div class="col-sm-6 col-lg-6 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Follow Us
					</h4>

					<ul class="social">
                        <li class="facebook"><a href="{{$contacts->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="{{$contacts->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="google-plus"><a href="{{$contacts->google}}"><i class="fa fa-google-plus"></i></a></li>
                        <li class="youtube"><a href="{{$contacts->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="linkedin"><a href="{{$contacts->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
				</div>
			</div>

			<div class="p-t-40">
				<p class="stext-107 cl6 txt-center">
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> Designed & Developed By CodingDuck
				</p>
			</div>
		</div>
	</footer>
  <!-- footer section end here -->

</body>
</html>
