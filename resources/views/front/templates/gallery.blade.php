<div class="home_media">
	<h4 style="color:red">Album</h4>
	<div class="row">
		@foreach($galleries as $gallery)
		<div class="col-xs-6 col-sm-4">
			<div class="album_gallery">
				<div class="thumbnail">
				<a href="{{url('album/'.$gallery->slug)}}" title="Lihat Semua foto di {{$gallery->name}}">
					@if(!empty($gallery->cover_image))
					<img src="{{asset('images/'.$gallery->cover_image)}}" class="img-responsive" alt="{{$gallery->name}}">
					@else
					<img src="{{asset('images/album.png')}}" class="img-responsive" alt="{{$gallery->name}}">
					@endif
				</a>
				<div class="caption">
					<h5 class='text-center'><a href="{{url('album/'.$gallery->slug)}}" title="Lihat Semua foto di {{$gallery->name}}">{{$gallery->name}}</a></h5>
				</div>
				</div>
			</div>
		</div>
		@endforeach
		<div class="clearfix"></div>
		<div id="pagination">
			{{ $galleries->links() }}
		</div>
	</div>
	<div class="gallery_photo">
		<h4 style="color:red">Foto Galeri</h4>
		<ul class="row">
		@foreach($galleries as $gallery)
			@foreach($gallery->images as $key => $value)
				<li class="col-sm-4 col-xs-6">
			        <img class="img-responsive" src="{{asset('images/'.$value)}}">
			    </li>
			@endforeach
		@endforeach
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