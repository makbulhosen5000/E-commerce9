
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CodingDuck E-Commerce</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('public/frontend')}}/images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/main.css">
</head>
<body class="animsition">
	
	

	<!-- buttom to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



	<script src="{{asset('public/frontend')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/animsition/js/animsition.min.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script src="{{asset('public/frontend')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/slick/slick.min.js"></script>
	<script src="{{asset('public/frontend')}}/js/slick-custom.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
	<script src="{{asset('public/frontend')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
	<script src="{{asset('public/frontend')}}/vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
	<script src="{{asset('public/frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	<script src="{{asset('public/frontend')}}/js/main.js"></script>

	{{-- CountDown Timer --}}
<script src="{{asset('public/backend/build/js/jquery.countdown.min.js')}}"></script>
<script>
   ;(function($) {
    
    var MERCADO_JS = {
      init: function(){
         this.mercado_countdown();
         
      }, 
    mercado_countdown: function() {
         if($(".mercado-countdown").length > 0){
                $(".mercado-countdown").each( function(index, el){
                  var _this = $(this),
                  _expire = _this.data('expire');
               _this.countdown(_expire, function(event) {
                        $(this).html( event.strftime('<span><b>%D</b> Days</span> <span><b>%-H</b> Hrs</span> <span><b>%M</b> Mins</span> <span><b>%S</b> Secs</span>'));
                    });
                });
         }
      },
   
   }
   
      window.onload = function () {
         MERCADO_JS.init();
      }
   
      })(window.Zepto || window.jQuery, window, document);
</script>

</body>
</html>








