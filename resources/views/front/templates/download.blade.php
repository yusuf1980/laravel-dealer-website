	<section class="download_feature body_column body_home">
      <div class="row text-center">
      	@foreach($productmenu as $key)
        <div class="col-xs-6 col-md-4">
          <div class="image_download">
          	@if(!empty($key->image))
            <img src="{{ asset('images/products/330/'.$key->image) }}" alt="{{ $key->title }}">
            @endif
          </div>
          <h4>{{ $key->title }}</h4>
          @if(!empty($key->brocure))
          <a href="{{ url($key->brocure) }}" class="btn btn-default">Download</a>
          @endif
        </div>
        @endforeach
      </div>
    </section>