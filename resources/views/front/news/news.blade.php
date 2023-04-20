  @section('css')
  	<link rel="stylesheet" href="{{asset('css/news.css')}}">
  @endsection

  <section class="room_news body_home">

  	@include('front.news._search')

  	<div class="row body_article">
      @if(isset($category))
      <div class="col-sm-12">
        <h4>Kategori <i>{{$item->name}}</i></h4>
      </div>
      @elseif(isset($tags))
      <div class="col-sm-12">
        <h4>Tags <i>{{$item->name}}</i></h4>
      </div>
      @endif

  		@if(isset($search))
  			<?php $n = $articles ?>
      @elseif(isset($category) || isset($tags))
        <?php $n = $berita ?>
  		@else
  			<?php $n = $news ?>
  		@endif
  		@if(count($n))
  		@foreach($n as $key)
  			<?php
		        $d = strip_tags($key->content);
		        if(strlen($d) >= 100) {
		            $d = strip_tags($d);
		            $desc = strpos($d, ' ', 120);
		            $desc = substr($d, 0, $desc);
		        }else {
		            $desc = $d;
		        }                      
		    ?>
  		<div class="col-sm-6">
  			<div class="media article_box">
  				<a href="{{ url('berita/'.$key->slug) }}" class="article_left">
  					<!--div class="article_box_image"></div-->
  					@if(!empty($key->image))
  					<img src="{{ asset( 'images/'.$key->image ) }}" alt="{{ $key->title }}">
  					@else
  					<img src="{{ asset( 'images/article_default.jpg' ) }}" alt="{{ $key->title }}">
  					@endif
  				</a>
  				<div class="article_body">
  					<h5 class="article_title">
  						<a href="{{ url('berita/'.$key->slug) }}">{{ $key->title }}</a>
  					</h5>
  					<div class="article_date">{{ $key->date_human }}</div>
  					@if(!empty($key->content))
  						{!!$desc!!} ... 
  					@else
						...
					@endif
  				</div>
  			</div>
  		</div>
  		@endforeach
      @else
      <div class="col-sm-12">
        <div class="media article_box" style="padding:30px 15px">
          Artikel pada <strong>{{$item->name}}</strong> tidak ditemukan <br><br>
          Kembali ke <a href="{{url('/')}}">Beranda</a>
        </div>
      </div>
  		@endif
  	</div>
  	<div class="clearfix"></div>
  	<div class="article_pagination text-center">
  	@if(isset($search))
			{!! $n->appends(['s'=> $search ])->render() !!}
		@else
			{{ $n->links() }}
		@endif
  	</div>
  </section>