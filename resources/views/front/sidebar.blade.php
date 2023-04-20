	  <div class="col-sm-4">
        <div class="sidebar_post">
          @foreach($widget_recent as $key)
          <a href="{{ url('berita/'.$key->slug) }}" class="post_list_item">
            <small class="muted">{{ $key->date_human }}</small>
            <p class="text_list_item">{{ $key->title }}</p>
          </a>
          @endforeach
        </div>
      </div>