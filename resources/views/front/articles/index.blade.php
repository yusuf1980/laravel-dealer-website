@extends('master')

@if(isset($item))
@if(!empty($item->meta_title))
@section('title', $item->meta_title.' | Honda Amartha')
@else
@section('title', $item->title.' | Honda Amartha')
@endif

@if(!empty($item->meta_description))
@section('description', $item->meta_description)
@endif

@if(!empty($item->meta_keywords))
@section('keywords', $item->meta_keywords)
@endif
@endif

@section('content')

	<section class="common_main">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="column">
						<div class="in_column">
							@if(isset($item))
							<h2>{{ucwords($item->name)}}</h2>
							@elseif(isset($search))
							<h2>Cari Artikel <span style="color:red">{{$search}}</span></h2>
							@else
							<h2>Semua Artikel</h2>
							@endif
							<div class="box_article">
								<ul class="base_box_article">
								@if(count($articles))
									@foreach($articles as $article)
									<?php
		                                $d = strip_tags($article->content);
		                                if(strlen($d) >= 100) {
		                                    $d = strip_tags($d);
		                                    $desc = strpos($d, ' ', 140);
		                                    $desc = substr($d, 0, $desc);
		                                }else {
		                                    $desc = $d;
		                                }
		                                
		                            ?>
									<li class="article_item">
										@if(!empty($article->image))
										<a href="{{url('artikel/'.$article->slug)}}" class="id_article">
											<img src="{{asset('images/'.$article->image)}}" alt="Thumbnail">
										</a>
										@endif
										<div class="content_list_article">
											<h4 class="title_list"><a href="{{url('artikel/'.$article->slug)}}">{{$article->title}}</a></h4>
											<div class="post_list_desc">
												<p>{!!$desc!!} ...</p>
											</div>
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
															<time class="post_list_time">3 Oktober 2017</time>
														</span>
													</div>
												</div>
											</div>
										</div>
									</li>
									@endforeach
								@else
								<p>Tidak Ditemukan Artikel atau Berita</p>
								@endif
								</ul>
							</div>
							<div id="pagination">
								@if(isset($search))
								{!! $articles->appends(['s'=> $search ])->render() !!}
								@else
								{{ $articles->links() }}
								@endif
							</div>
						</div>
					</div>
				</div>
				
				@include('front.sidebar')

			</div>
		</div>
	</section>

@endsection