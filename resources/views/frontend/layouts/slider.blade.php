<!-- slider start -->
<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
			@foreach ($sliders as $slider)
            <div class="item-slick1" style="background-image: url({{asset('public/images/slider_images/'.$slider->image)}});">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                    <h3 class="wrap-countdown mercado-countdown pb-5 text-dark"    data-expire="{{ Carbon\Carbon::parse($timers->launch_date)->format('Y/m/d h:i:s') }}"></h3>
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">

                                {{$slider->sort_title}}
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{$slider->long_title}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
			</div>
		</div>
	</section>
	<!-- slider end -->