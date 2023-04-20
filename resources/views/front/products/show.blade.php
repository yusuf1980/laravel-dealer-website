@extends('master')

@if(!empty($product->meta_title))
@section('title', $product->meta_title.' | Honda Amartha')
@else
@section('title', $product->title.' | Honda Amartha')
@endif

@if(!empty($product->meta_description))
@section('description', $product->meta_description)
@endif

@if(!empty($product->meta_keywords))
@section('keywords', $product->meta_keywords)
@endif

@section('content')

@section('css')
  <link rel="stylesheet" href="{{asset('css/jquery.flex-images.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
@endsection

	<div class="top_main_page"></div>

	<section class="content_product">
  		<div class="product_navigation">
  			<nav class="navbar navbar-default">
      			<div class="container-fluid">
      				<div class="navbar-header">
      				  <span class="title_toggle">Menu Product <i class="fa fa-chevron-right" aria-hidden="true"></i> </span>
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarProduct" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			          </a>
			        </div>
      				<div class="collapse navbar-collapse" id="navbarProduct">
      					<ul class="nav nav-justified">
                   @if(!empty($product->header))
      						 <li class="active"><a href="#beranda">BERANDA<span class="sr-only">(current)</span></a></li>
                   @endif
                   @if(!empty($product->title_one))
      						 <li><a href="#desc_one">{{$product->title_one}}</a></li>
                   @endif
                   @if(!empty($product->title_two))
      						 <li><a href="#desc_two">{{$product->title_two}}</a></li>
                   @endif
                   @if(!empty($product->title_three))
      						 <li><a href="#desc_three">{{$product->title_three}}</a></li>
                   @endif
                   @if(!empty($product->title_four))
      						 <li><a href="#desc_four">{{$product->title_four}}</a></li>
                   @endif
      						 <li><a href="#multimedia">MULTIMEDIA</a></li>
                   @if(!empty($product->variants))
      						 <li><a href="#price">HARGA</a></li>
                   @endif
      					</ul>
      				</div>
      			</div>
      		</nav>
  		</div>
  	</section>

  	<div class="top_main_page_2"></div>
  	<section class="content_product_dua">
      @if(!empty($product->header))
      <div class="beranda" id="beranda">
        <img src="{{asset('images/'.$product->header)}}" alt="{{$product->title}}">
      </div>
      @endif
      @if(!empty($product->desc_one))
      <div class="exterior block_fitur" id="desc_one" style="top: 400px;">
        <div class="title_fitur text-center">
          <h4 class="title_f">{{$product->title_one}}</h4>
        </div>
        <div class="content_fitur">
          {!!$product->desc_one!!}
        </div>
      </div>
      @endif
      @if(!empty($product->desc_two))
      <div class="interior block_fitur" id="desc_two">
        <div class="title_fitur text-center">
          <h4 class="title_f">{{$product->title_two}}</h4>
        </div>
        <div class="content_fitur">
          {!!$product->desc_two!!}
        </div>
      </div>
      @endif
      @if(!empty($product->desc_three))
      <div class="security block_fitur" id="desc_three">
        <div class="title_fitur text-center">
          <h4 class="title_f">{{$product->title_three}}</h4>
        </div>
        <div class="content_fitur">
          {!!$product->desc_three!!}
        </div>
      </div>
      @endif
      @if(!empty($product->desc_four))
      <div class="speck block_fitur" id="desc_four">
        <div class="title_fitur text-center">
          <h4 class="title_f">{{$product->title_four}}</h4>
        </div>
        <div class="content_fitur">
          {!!$product->desc_four!!}
        </div>
      </div>
      @endif
      @if(!empty($product->content))
      <div class="content block_fitur">
       <div class="title_fitur text-center">
          <h4 class="title_f">LAINNYA</h4>
        </div>
        <div class="content_fitur">
          {!!$product->content!!}
        </div>
      </div>
      @endif
      <div class="multimedia block_fitur" id="multimedia">
        <div class="title_fitur text-center">
          <h4 class="title_f">MULTIMEDIA</h4>
        </div>
        <div class="content_fitur">
          <div id="fancy" class="flex-images">
          @foreach($product->media as $media)
            <div class="item">
              @if($media->template == 'image')
              @if(!empty($media->content))
              <a href="{{url($media->content)}}" data-fancybox="group" data-caption="{{$media->name}}">
                <img src="{{url($media->content)}}" alt="" />
              </a>
              @endif
              @else
              @if(!empty($media->video))
              <a class="play-icon" href="{{url($media->video['url'])}}" data-fancybox="group" data-caption="{{$media->title}}">
                <img src="{{url($media->video['image'])}}" alt="" />
              </a>
              @endif
              @endif
            </div>
          @endforeach
          </div>

          <!--div id="fancy" class="flex-images">
            <div class="item">
              <a href="{{url('images/HCIL-Carousel.jpg')}}" data-fancybox="group" data-caption="My caption">
                <img src="{{url('images/all-new-br-v.png')}}" alt="" />
              </a>
            </div>
            <div class="item">
              <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" data-fancybox="group" data-caption="My caption">
                <img src="{{url('images/city.png')}}" alt="" />
              </a>
            </div>
            
          </div-->

        </div>
      </div>
      @if(!empty($product->variants))
      <div class="price block_fitur" id="price">
        <div class="title_fitur text-center">
          <h4 class="title_f">HARGA</h4>
        </div>
        <div class="content_fitur" style="padding-top: 20px">
          <div class="row">
                  <div class="col-sm-6">
                    <div class="thumbnail_price">
                      <img src="{{asset('images/products/330/'.$product->image)}}" alt="{{$product->title}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="name_car_price">
                      <h3 class="name_price">{{$product->title}}</h3>
                      @if(!empty($product->variants))
                      <?php 
                      foreach($product->variants as $k) {
                        $minprice[] = preg_replace('/[^0-9]/','',$k['price']);
                      }
                      ?>
                      <h4 class="price_start">Rp. {{ number_format(min($minprice)) }} </h4>
                      @endif
                    </div>
                  </div>
                  
          </div>
          <table class="table table-hover">
                  <tr>
                    <th>Variant</th>
                    <th>Harga</th>
                  </tr>
                  <?php ?>
                  @for($i=0; $i<=count($product->variants) - 1; $i++)
                  <tr>
                    <td>{{$product->variants[$i]['title']}}</td>
                    <td>
                      Rp. {{number_format(preg_replace('/[^0-9]/','', $product->variants[$i]['price']))}}
                    </td>
                  </tr>
                  @endfor
          </table>
          <div class="box_link_price text-center">
            @if(!empty($product->brocure))
              <a style="margin: 20px auto 20px" href="{{url($product->brocure)}}" class="download_brocure btn btn-danger btn-lg"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Brosur</a>
            @endif
              <a style="margin: 20px auto 20px" href="{{url('order')}}" class="order_link btn btn-success btn-lg"><i class="fa fa-car" aria-hidden="true"></i> Order Now</a>
          </div>
        </div>
      </div>
      @endif
  		
  	</section>
  	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tertarik dengan {{$product->title}}</h4>
      </div>
      <form method="POST" id="send">
      {{ csrf_field() }}
      <div class="modal-body">
        <img class="text-center" src="{{asset('images/products/330/'.$product->image)}}" alt="">
        <p style="font-size:16px;">Input nomor ponsel anda dan kami akan menghubungi balik.</p>
        <div id="success-msg" class="hide">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong>Success!</strong>Terima kasih, kami akan segera menghubungi anda!!
                    </div>
                </div>
        <input type="hidden" value="{{$product->title}}" name="mobil">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <input type="text" name="nama" id="myInput" class="form-control" placeholder="Nama Anda">
          <span class="text-danger">
              <strong id="name-error"></strong>
          </span>
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon Anda">
          <span class="text-danger">
              <strong id="telepon-error"></strong>
          </span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button id="submitForm" type="button" class="btn btn-primary">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('js')
  <script src="{{asset('js/jquery.flex-images.min.js')}}"></script>
  <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
  $('.flex-images').flexImages({rowHeight: 120});
  /*$("#fancy").fancybox({
    selector : '[data-fancybox="images"]',
    loop     : true
  });*/
  $(document).ready(function() {
    console.log(getCookie('visited'));
    if (document.cookie.indexOf('visited=true') == -1 || getCookie('visited') == null){
    var myModal = $('#myModal');
    setTimeout(function(){
      myModal.modal();
    }, 15000);
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus();
      /*var myModal = $(this);
      clearTimeout(myModal.data('hideInterval'));
      myModal.data('hideInterval', setTimeout(function(){
        myModal.modal('hide');
      }, 5000));*/
    })
    }
  });
  $('body').on('click', '#submitForm', function(){
    var registerForm = $("#send");
    var formData = registerForm.serialize();
    var slug = '{{$product->slug}}';
    var url = '{{url("mobil/".$product->slug."/send")}}';
    $( '#name-error' ).html( "" );
    $( '#email-error' ).html( "" );
    $( '#password-error' ).html( "" );

    $.ajax({
            url: '{{url("mobil/".$product->slug."/send")}}',
            type:'POST',
            data:formData,
            success:function(data) {
                if(data.errors) {
                    if(data.errors.nama){
                        $( '#name-error' ).html( data.errors.nama[0] );
                    }
                    if(data.errors.telepon){
                        $( '#telepon-error' ).html( data.errors.telepon[0] );
                    }
                }
                if(data.success) {
                  //$('#myModal').modal('hide');
                    $('#success-msg').removeClass('hide');
                    setInterval(function(){ 
                        $('#myModal').modal('hide');
                        $('#success-msg').addClass('hide');
                    }, 5000);
                  /*swal({
                        title: "Terima Kasih "+data.name,
                        text: "Kami akan segera menghubungi Anda",
                        icon: "success",
                        // more options
                    });*/
                  var year = 1000*60*60*24*365;
                  var expires = new Date((new Date()).valueOf() + year);
                  document.cookie = "visited=true;expires=" + expires.toUTCString();
                }
            }
    });
    
  });
  function getCookie(name) 
    {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
</script>
@endsection
  
@endsection