<?php
$title = $settings->where('key', 'title_website')->first();
$keyword = $settings->where('key', 'keyword_website')->first();
$desc = $settings->where('key', 'desc_website')->first();
$logo_utama = $settings->where('key', 'logo_utama')->first();
//$logo_small = $settings->where('key', 'logo_small')->first();
$twitter = $settings->where('key', 'twitter')->first();
$facebook = $settings->where('key', 'facebook')->first();
$google_plus = $settings->where('key', 'google_plus')->first();
$copyright = $settings->where('key', 'copyright')->first();
$slogan = $settings->where('key', 'slogan')->first();
$operation_sales = $settings->where('key', 'operation_sales')->first();
$operation_service = $settings->where('key', 'operation_service')->first();
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  	<title>@yield('title', $title->value)</title>
  	<meta name="description" content="@yield('description', $desc->value)">
	<meta name="keywords" content="@yield('keywords', $keyword->value)">
  	<meta name="author" content="Honda Amartha">
    <link rel="icon" type="image/png" href="https://www.hondaamartha.com/images/favicon.ico">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	@yield('css')
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
	<!--link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"-->
	@yield('style')
  <style>
  .navbar-right .dropdown-menu.submenu {
    right: auto;
  }
  .item-menu {
    border-bottom: 1px solid #e5e5e5;
  }
  .active_menu {
    background-color: #e5e5e5;
  }
  .dropdown-menu > li.active_menu > a {
    color: #EC1B2E;
  }
  </style>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>

  <body>
	<section class="header" id="header">
    <div class="top-header">
      <div class="pull-left slogan_dealer">{{$slogan->value}}</div>
      <ul class="menu-top">
        <li><a href="{{ $kolom_1->url }}"><i class="fa {{ $kolom_1->icon }}" aria-hidden="true"></i> {{ $kolom_1->text }}</a></li>
        <li><a href="{{ $kolom_2->url }}"><i class="fa {{ $kolom_2->icon }}" aria-hidden="true"></i> {{ $kolom_2->text }}</a></li>
        <li><a href="{{ $kolom_3->url }}"><i class="fa {{ $kolom_3->icon }}" aria-hidden="true"></i> {{ $kolom_3->text }}</a></li>
      </ul> 
    </div>
    
    @include('menu')

  </section>
  <div class="clearfix"></div>

  @yield('content')

  <?php
  //$address = $settings->where('widget', 'address')->first();
  ?>

  <section class="footer">
    <div class="topFooter" style="z-index:1000">
      <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" title="Klik untuk melihat Jam Pelayanan Kami">
        Jam Kerja Kami <span style="font-size:10px">(Klik Di sini)</span>
      </a>
      <div class="collapse" id="collapseExample">
        <div class="well">
          <div class="row">
            <div class="col-sm-6">
              <div class="hour_operation">
                <h4 class="title_hour">SALES DEPARTMENT</h4>
                <div class="time_hour">
                  <table class="table table-bordered">
                    @foreach( (array) json_decode($operation_sales->value) as $key)
                    <tr>
                      <td>{{$key->day}}</td>
                      <td>{{$key->time}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="hour_operation">
                <h4 class="title_hour">SERVICE DEPARTMENT</h4>
                <div class="time_hour">
                  <table class="table table-bordered">
                    @foreach( (array) json_decode($operation_service->value) as $key)
                    <tr>
                      <td>{{$key->day}}</td>
                      <td>{{$key->time}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    <div class="bottomFooter">
      <div class="row">
        <div class="col-md-4">
          <div class="social_med">
            <h4><i class="fa fa-map-marker" aria-hidden="true"></i> {{$address_fake->title}}</h4>
            {!! $address_fake->content !!}
          </div>
        </div>
        <div class="col-md-4">
          <div class="social_med mid_second">
            <h4><i class="fa fa-phone" aria-hidden="true"></i> {{$support_fake->title}}</h4>
            {!! $support_fake->content !!}
          </div>
        </div>
        <div class="col-md-4">
          <div class="social_med mid_second">
            <h4><i class="fa fa-share-square" aria-hidden="true"></i> {{$social->title}}</h4>
            <ul class="mediaIcon">
              @if(!empty($social->facebook))
              <li><a href="{{$social->facebook}}" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              @endif
              @if(!empty($social->twitter))
              <li><a href="{{$social->twitter}}" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              @endif
              @if(!empty($social->youtube))
              <li><a href="{{$social->youtube}}" class="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              @endif
              @if(!empty($social->instagram))
              <li><a href="{{$social->instagram}}" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      {{$copyright->value}} 
      <a href="#"></a> 
      <a href="#"></a>
    </div>
  </section>

  
	<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/honda.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
   @if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            /*text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: "{!! Session::get('sweet_alert.timer') !!}",
            type: "{!! Session::get('sweet_alert.type') !!}",
            showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
            confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
            confirmButtonColor: "#AEDEF4"
            icon: "success",*/
            title: "{!! Session::get('sweet_alert.title') !!}",
            text: "{!! Session::get('sweet_alert.text') !!}",
            icon: "{!! Session::get('sweet_alert.type') !!}",
            // more options
        });
    </script>
  @endif

	@yield('js')
	@yield('script')
  </body>
</html>