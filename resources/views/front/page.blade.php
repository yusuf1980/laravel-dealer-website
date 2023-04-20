@extends('master')

@if(!empty($page->meta_title))
@section('title', $page->meta_title.' | Honda Amartha')
@else
@section('title', $page->title.' | Honda Amartha')
@endif

@if(!empty($page->meta_description))
@section('description', $page->meta_description)
@endif

@if(!empty($page->meta_keywords))
@section('keywords', $page->meta_keywords)
@endif

@section('content')

  <div class="top_main_page"></div>
  
  @if($page->template != 'berita')
  <section class="title_header">
    <div class="title_in">
      <h1>{{$page->title}}</h1>
      <p>{{$page->desc}}</p>
    </div>
  </section>

    @if($page->template == 'harga')
  		@include('front.templates.price')
    @elseif($page->template == 'download_brocure')
      @include('front.templates.download')
    @elseif($page->template == 'simulasi_kredit')
      @include('front.templates.credit_simulation')
    @elseif($page->template == 'booking_service')
      @include('front.templates.booking')
    @elseif($page->template == 'order')
      @include('front.templates.order')
    @else
      <section class="body_column body_home">
        <div class="content_page">
          {!! $page->content !!}
        </div>
      </section>
  	@endif

  @else
    @include('front.news.news')
  @endif

@endsection


