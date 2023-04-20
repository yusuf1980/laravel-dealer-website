<?php
$phone_marketing = $settings->where('key', 'phone_marketing')->first();
?>
			<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <span class="menu_utama">Menu <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset($logo_utama->value)}}" alt="Logo Honda"/>
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="defaultNavbar1">
          <ul class="nav navbar-nav navbar-right nav-mega">
          	@if ($menu_items->count())
					@foreach($menu_items as $k => $menu_item)
						@if (($menu_item->page_id && is_object($menu_item->page)) || !$menu_item->page_id)
							@if ($menu_item->type == 'product')
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="menuIcon modelsIcon hidden-xs"></i><span class="item_menu">PRODUCT<span class="caret"></span></span></a>
              						<ul class="dropdown-menu product_menu">
              							<li>
						                  <div class="container mega_menu">
						                    <div class="row">
						                    	@foreach($productmenu as $product)
						                    		<div class="col-xs-6 col-sm-3 col-md-3 in_product">
								                        <a href="{{url('mobil/'.$product->slug)}}">
								                          @if(!empty($product->image))
								                          <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->title}}">
								                          @endif
								                          <h5>{{$product->title}}</h5>
								                        </a>
								                    </div>
						                    	@endforeach
						                    </div>
						                  </div>
						                </li>
						            </ul>
							@elseif ($menu_item->children->count())
							    <li class="navitem dropdown {{ ($k==0)?' fistitem':'' }}">
							    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							    		<i class="fa {{$menu_item->icon}} fa-lg hidden-xs"></i>
							    		<span class="item_menu menu_brocure">
						    				@if (strpos($menu_item->name, ' ') !== false) 
												<?php 
												$name_menu_item = explode(' ',trim($menu_item->name));
												?>
												<span class="item_2name"><span class="item_menu2">{!! $name_menu_item[0] !!}</span> {!! $name_menu_item[1] !!}</span> <span class="caret"></span>
											@else
												{{ $menu_item->name }}
											@endif
											
						    			</span>
							    	</a>
							            <ul class="dropdown-menu submenu">
							            @foreach ($menu_item->children as $i => $child)
							                <li class="{{ ($child->url() == Request::url())?'active_menu':'' }} item-menu">
							                	<a href="{{ $child->url() }}">
													{{ $child->name }}
							                	</a>
							                </li>
							            @endforeach
							            </ul>
							    </li>
						    @else
						    	<li class="{{ ($k==0)?' fistitem':'' }} {{ ($menu_item->url() == Request::url())?' active':'' }}">
						    		<a href="{{ $menu_item->url() }}">
						    			<i class="fa {{$menu_item->icon}} fa-lg hidden-xs"></i>
						    			<span class="item_menu menu_brocure">
						    				@if (strpos($menu_item->name, ' ') !== false) 
													   <?php $menu_item = str_replace(' ', ' <span class="item_menu2">', $menu_item->name) . '</span>'; ?>
													   {!! $menu_item !!}
													@else
														{{ $menu_item->name }}
													@endif
						    			</span>
						    		</a>
						    	</li>
						    @endif
						@endif
					@endforeach
				@endif

            <li class="hidden-xs marketing"><a style="padding: 5px 5px 0; font-size:14px;line-height: 18px;" href="#"><i class="fa fa-phone"></i> MARKETING <br><span style="">@foreach( (array) json_decode($phone_marketing->value) as $key) {{ $key->phone }} <br> @endforeach </span></a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>


			