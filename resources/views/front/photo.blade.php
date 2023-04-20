@extends('master')

@section('title', $photo->name.' | BPKAD Nunukan')

@section('content')

	<section class="common_main">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="column">
						<div class="in_column">
							<div class="category_name"></div>
							<div class="title_article_in"><h3>{{$photo->name}}</h3></div>
								<div class="home_media">
									<div class="row">
										<div class="col-xs-12 col-sm-3">
											<div class="album_gallery text-center">
												
													@if(!empty($photo->cover_image))
													<img src="{{asset('images/'.$photo->cover_image)}}" class="img-responsive" alt="{{$photo->name}}">
													@else
													<img src="{{asset('images/album.png')}}" class="img-responsive" alt="{{$photo->name}}">
													@endif
												
											</div>
										</div>
										
										<div class="clearfix"></div>
										
									</div>
									<div class="gallery_photo" style="text-align:left">
										<h4 style="color:red;">Foto Galeri</h4>
										<ul class="row">
										@if(!empty($photo->images))
											@foreach($photo->images as $key => $value)
												<li class="col-sm-4 col-xs-6">
											        <img class="img-responsive" src="{{asset('images/'.$value)}}">
											    </li>
											@endforeach
										@else
											<p style="margin-left:10px;">Tidak ditemukan foto pada album ini.</p>
										@endif
										</ul>
									</div><!--end gallery-photo-->
								</div>

								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								      <div class="modal-dialog">
								        <div class="modal-content">         
								          <div class="modal-body">                
								          </div>
								        </div><!-- /.modal-content -->
								      </div><!-- /.modal-dialog -->
								    </div><!-- /.modal -->
								@section('js')
									<script src="{{asset('js/photo-gallery.js')}}"></script>
								@endsection
							
							@if($photo->comments == 1)
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