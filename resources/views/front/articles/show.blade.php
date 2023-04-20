@extends('master')

@if(!empty($article->meta_title))
@section('title', $article->meta_title.' | Honda Amartha')
@else
@section('title', $article->title.' | Honda Amartha')
@endif

@if(!empty($article->meta_description))
@section('description', $article->meta_description)
@endif

@if(!empty($article->meta_keywords))
@section('keywords', $article->meta_keywords)
@endif

@section('content')

	<section class="common_main">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="column">
						<div class="in_column">
							<div class="category_name"><h4><a href="{{url('kategori/'.$article->category->slug)}}">{{$article->category->name}}</a></h4></div>
							<div class="title_article_in"><h3>{{$article->title}}</h3></div>
							<div class="post_list_meta">
								<div class="post_list_author">
									@if(!empty($article->user->image))
									<img src="{{url('images/'.$article->user->image)}}" alt="{{$article->user->name}}">
									@else
									<img src="{{url('images/user.png')}}" alt="{{$article->user->name}}">
									@endif
									<div class="post_list_group">
										<span class="post_list_author_name">
											<a href="#">{{$article->user->name}}</a>
											<time class="post_list_time">{{$article->date_human}}</time>
										</span>
									</div>
									<div class="share_social">
										{!! Share::page(url('artikel/'.$article->slug), $article->title, ['class' => 'btn btn-default'])
											->facebook()
											->twitter()
											->googlePlus() !!}
									</div>
								</div>
							</div>
								
							<div class="content_post">
								{!!$article->content!!}
							</div>
							<div class="tag_list" style="margin-top:20px">
								@if($article->tags->count())
									@foreach($article->tags as $tag)
										<a href="{{url('tag/'.$tag->slug)}}" class="btn btn-default btn-sm">#{{$tag->name}}</a>
									@endforeach
								@endif
							</div>
							<div class="related_news">
								<h4 class="title_related">Berita Terkait</h4>
								<ul class="related_ul">
									@if(count($articles ))
									@foreach($articles as $art)
									<li>
										<i class="fa fa-chevron-right" aria-hidden="true"></i>
										<a href="{{url('artikel/'.$art->slug)}}">{{$art->title}}</a>
									</li>
									@endforeach
									@else
									<p>Tidak ditemukan berita terkait <span style="color: green">{{$article->title}}</span>
									@endif
								</ul>
							</div>
							@if($article->comments == 1)
							<div class="content_comment" style="margin-top:40px">
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
								s.src = 'https://bpkadnunukan.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
								})();
								</script>
								<noscript>Silahkan aktifkan javascript untuk melihat <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>                          
							</div>
							@endif
						</div>
					</div>
				</div>
				
				@include('front.sidebar')

			</div>
		</div>
	</section>

@section('js')
	<script src="{{ asset('js/share.js') }}"></script>
@endsection

@endsection