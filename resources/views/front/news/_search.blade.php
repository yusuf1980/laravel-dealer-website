    <div class="row title_room_news">
      <div class="col-sm-12">
        <h4 class="pull-left">Search <i class="fa fa-angle-right"></i></h4> 
        <div class="pull-right">
          {!! Form::open(['action'=>['HomeController@search'],'method' => 'GET','role'=>'search','class'=>'form-inline','id'=>'news_search']) !!}
          
            <span class="form-group">
              <!--label for=""></label-->
              <input name="s" type="text" class="form-control input-sm" placeholder="Cari Berita Di sini">
            </span>
            <button class="btn btn-primary btn-sm" type="submit">
              SEARCH
              <i class="fa fa-angle-right"></i>
            </button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  	<div class="clearfix"></div>

  	