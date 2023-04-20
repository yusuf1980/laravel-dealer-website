@extends('master')

@section('css')
	<link rel="stylesheet" href="{{asset('OwlCarousel/assets/owl.carousel.min.css')}}">
  	<link rel="stylesheet" href="{{asset('OwlCarousel/assets/owl.theme.default.min.css')}}">
  	<link href="{{asset('css/homepage.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

	<section class="slide-header">
  	<div id="homepage-slides" class="owl-carousel owl-theme">
  		@foreach($sliders as $slider)
	    	<div class="item">
	    		@if(!empty($slider->url))
				<a href="{!!$slider->url!!}">
				@endif
		    		<img src="{{asset('images/'.$slider->image)}}" alt="{{$slider->title}}" title="{{$slider->title}}">
		    	@if(!empty($slider->url))
	    		</a>
	    		@endif
	    	</div>
	    	@endforeach
   
    	<!--div class="item"><img src="{{ asset('images/honda-jazz.jpg') }}" alt="Honda Jazz"></div>
    	<div class="item"><img src="{{ asset('images/honda-city.jpg') }}" alt="Honda City"></div>
    	<div class="item"><img src="{{ asset('images/typeRBANNER.jpg') }}" alt="R Banner"></div-->

  	</div>
  </section>	

  <section class="body_home">
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <div class="home_content">
          <div class="home_img">
          	@if(!empty($image_1->url))
            <a href="{{$image_1->url}}">
            @endif
              @if(!empty($image_1->image))
              <img src="{{asset($image_1->image)}}" alt="{{$image_3->title}}">
              @endif
              <h5>{{$image_1->title}} </h5>
            @if(!empty($image_1->url))
            </a>
            @endif
            {{$image_1->desc}}
            @if(!empty($image_1->url))
            <a class="readMore" href="{{$image_1->url}}">Temukan di Sini</a>
            @endif
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="home_content">
          <div class="home_img">
          	@if(!empty($image_2->url))
            <a href="{{$image_2->url}}">
            @endif
            	@if(!empty($image_1->image))
              <img src="{{asset($image_2->image)}}" alt="{{$image_3->title}}">
              	@endif
              <h5>{{$image_2->title}} </h5>
            @if(!empty($image_2->url))
            </a>
            @endif
            {{$image_2->desc}}
            @if(!empty($image_2->url))
            <a class="readMore" href="{{$image_2->url}}">Temukan di Sini</a>
            @endif
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="home_content">
          <div class="home_img">
          	@if(!empty($image_3->url))
            <a href="{{$image_3->url}}">
            @endif
              @if(!empty($image_1->image))
              <img src="{{asset($image_3->image)}}" alt="{{$image_3->title}}">
              @endif
              <h5>{{$image_3->title}} </h5>
            @if(!empty($image_3->url))
            </a>
            @endif
            {{$image_3->desc}}
            @if(!empty($image_3->url))
            <a class="readMore" href="{{$image_3->url}}">Temukan di Sini</a>
            @endif
          </div>
        </div>
      </div>

    </div>
  </section>
	
@section('js')
	<script src="{{asset('OwlCarousel/owl.carousel.min.js')}}"></script>
@endsection

@section('script')
	<script>
		$(document).ready(function() {
 
		  $("#homepage-slides").owlCarousel({
			  autoplay : true,
    		items : 1,
			  loop: true,
			  /*stagePadding: 70,*/
			  nav: true,
			  lazyLoad: true,
			  video: true,
			  merge:true,
			  center:true,
        /*autoHeight:true,*/
			  navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		  });

		});
	</script>
@endsection

@endsection