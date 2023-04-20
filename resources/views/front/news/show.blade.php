@extends('master')

@if(!empty($article->meta_title))
@section('title', $article->meta_title.' | Honda Amartha')
@else
@section('title', $article->title.' | Honda Amartha')
@endif

@if(!empty($article->meta_description))
@section('description', $article->meta_description)
@endif

@if(!empty($article->meta_keyword))
@section('keywords', $article->meta_keyword)
@endif

@section('content')

  @section('css')
  	<link rel="stylesheet" href="{{asset('css/news.css')}}">
  @endsection

  <div class="top_main_page"></div>

  <section class="room_news body_home">

  	@include('front.news._search')

  	<div class="clearfix"></div>
    <div class="row single_article">
      <div class="col-sm-8">
        <div class="post">
          <h2 class="post_title">{{$article->title}}</h2>
          <div class="post_metadata" style="">
            <div class="pull-left post_meta">
              <span style="margin-right:20px;" class="date_news">Dipublikasikan: {{$article->date_human}}</span>
              <span class="category_news">Kategori: <a href="{{url('kategori/'.$article->category->slug)}}">{{$article->category->name}}</a></span>
            </div>
            <div class="pull-right post_social_media"></div>
          </div>
          <div class="clearfix"></div>
          <div class="post_content">
            {!! $article->content !!}

            @if(count($article->tags))
            <div class="tag-news">
              <h4>Tags</h4>
              @foreach($article->tags as $tag)
                <a href="{{url('tag/'.$tag->slug)}}"><span style="font-size:13px" class="label label-default">#{{$tag->name}}</span></a>
              @endforeach
            </div>
            @endif

          </div>
          <div class="post_terkait" style="margin-top: 40px;">
          	<h4>Berita Terkait</h4>
          	<ul>
          		@foreach($articles as $a)
          		<li><a href="{{ url('berita/'.$a->slug) }}">{{ $a->title }}</a></li>
          		@endforeach
          	</ul>
          </div>
          @if($article->comments == 1)
          <div class="post_comment" style="margin-top:40px">
          	<!--img src="{{ asset('images/comment_image.jpg') }}" alt="Disqus"-->
          	<div id="disqus_thread"></div>
              <script>

              /**
              *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
              *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
              /*
              var disqus_config = function () {
              this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
              this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
              };
              */
              (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
              s.src = 'https://hondaamartha.disqus.com/embed.js';
              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
              })();
              </script>
              <noscript>Silahkan aktifkan javascript untuk melihat <a href="https://disqus.com/?ref_noscript">komentar melalui Disqus.</a></noscript>            
          </div>
          @endif
        </div>
      </div>
      
      @include('front.sidebar')

    </div>

  </section>



@section('js')
	<script src="{{ asset('js/share.js') }}"></script>
  <script id="dsq-count-scr" src="//hondaamartha.disqus.com/count.js" async></script>
@endsection

@endsection