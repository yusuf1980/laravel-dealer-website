
  @extends('master')

  @if(!empty($item->meta_title))
    @section('title', $item->meta_title.' | Honda Amartha')
  @else
    @section('title', $item->name.' | Honda Amartha')
  @endif

  @if(!empty($item->meta_description))
    @section('description', $item->meta_description)
  @endif

  @if(!empty($item->meta_keyword))
    @section('keywords', $item->meta_keyword)
  @endif

  @section('content')

  <div class="top_main_page"></div>


  @include('front.news.news')


  @endsection
