	<section class="price_feature body_column body_home">
    	<div class="price_in">
    		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    			<?php $collapse = 1; ?>
    		@foreach($productmenu as $key)
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="heading{{$collapse}}">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$collapse}}" aria-expanded="true" aria-controls="collapse{{$collapse}}">
			          <span class="title_car_price"> {{$key->title}} <i class="fa fa-hand-o-left chev_tunjuk" aria-hidden="true"></i> <span class="text_view">Lihat Harga</span></span>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse{{$collapse}}" class="panel-collapse {{$collapse==1?'collapse in':'collapse'}}" role="tabpanel" aria-labelledby="heading{{$collapse}}">
			      <div class="panel-body">
			      	<div class="heading_price">
			      		<div class="row">
			      			@if(!empty($key->image))
			      			<div class="col-sm-5">
			      				<div class="thumbnail_price">
					      			<img style="width:330px" src="{{asset('images/products/330/'.$key->image)}}" alt="{{$key->title}}">
					      		</div>
			      			</div>
			      			@endif
				      		<div class="col-sm-4">
					      		<div class="name_car_price">
					      			<h3 class="name_price">{{$key->title}}</h3>
					      			@if(!empty($key->variants))
					      			<?php 
					      			foreach($key->variants as $k) {
					      				$minprice[] = preg_replace('/[^0-9]/','',$k['price']);
					      			}
					      			?>
					      			<h4 class="price_start">Rp. {{ number_format(min($minprice)) }} </h4>
					      			@endif
				      			</div>
				      		</div>
				      		<div class="col-sm-3">
					      		<div class="box_link_price">
					      			@if(!empty($key->brocure))
					      			<a href="{{url($key->brocure)}}" class="box_price download_brocure btn btn-danger btn-lg">Download Brosur</a>
					      			@endif
					      			<a href="{{url('mobil/'.$key->slug)}}" class="box_price view_product btn btn-info btn-lg">Lihat Produk</a>
					      			<a href="order.html" class="box_price order_link btn btn-success btn-lg">Order Now</a>
					      		</div>
					      	</div>
			      		</div>
			      	</div>
			      	@if(!empty($key->variants))
			      	<div class="table_price">
			      		<table class="table table-hover">
			      			<tr>
			      				<th>Variant</th>
			      				<th>Harga</th>
			      			</tr>
			      			<?php ?>
			      			@for($i=0; $i<=count($key->variants) - 1; $i++)
			      			<tr>
			      				<td>{{$key->variants[$i]['title']}}</td>
			      				<td>Rp. {{number_format(preg_replace('/[^0-9]/','', $key->variants[$i]['price']))}}</td>
			      			</tr>
			      			@endfor
			      		</table>
			      	</div>
			      	@endif
			      </div>
			    </div>
			  </div>
			  <?php $collapse++; ?>
			@endforeach
			  <!--div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          <span class="title_car_price"> Honda Brio <i class="fa fa-hand-o-left chev_tunjuk" aria-hidden="true"></i> <span class="text_view">Lihat Harga</span></span>
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      <div class="panel-body">
			        <div class="heading_price">
			      		<div class="row">
			      			<div class="col-sm-5">
			      				<div class="thumbnail_price">
					      			<img src="images/new-brio.png" alt="Honda Jazz">
					      		</div>
			      			</div>
				      		<div class="col-sm-4">
					      		<div class="name_car_price">
					      			<h3 class="name_price">Honda Brio</h3>
					      			<h4 class="price_start">Rp. 1.000.000.000</h4>
				      			</div>
				      		</div>
				      		<div class="col-sm-3">
					      		<div class="box_link_price">
					      			<a href="#" class="box_price download_brocure btn btn-danger btn-lg">Download Brosur</a>
					      			<a href="product.html" class="box_price view_product btn btn-info btn-lg">Lihat Produk</a>
					      			<a href="order.html" class="box_price order_link btn btn-success btn-lg">Order Now</a>
					      		</div>
					      	</div>
			      		</div>
			      	</div>
			      	<div class="table_price">
			      		<table class="table table-hover">
			      			<tr>
			      				<th>Tipe</th>
			      				<th>Manual</th>
			      				<th>Automatic</th>
			      			</tr>
			      			<tr>
			      				<td>Tipe 1</td>
			      				<td>Harga Manual 1</td>
			      				<td>Harga Automatic 1</td>
			      			</tr>
			      			<tr>
			      				<td>Tipe 2</td>
			      				<td>Harga Manual 2</td>
			      				<td>Harga Automatic 2</td>
			      			</tr>
			      			<tr>
			      				<td>Tipe 3</td>
			      				<td>Harga Manual 3</td>
			      				<td>Harga Automatic 3</td>
			      			</tr>
			      		</table>
			      	</div>
			      </div>
			    </div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingThree">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          <span class="title_car_price">Honda CR-V <i class="fa fa-hand-o-left chev_tunjuk" aria-hidden="true"></i> <span class="text_view">Lihat Harga</span></span>
			        </a>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      <div class="panel-body">
			        <div class="heading_price">
			      		<div class="row">
			      			<div class="col-sm-5">
			      				<div class="thumbnail_price">
					      			<img src="images/cr-v.png" alt="Honda Jazz">
					      		</div>
			      			</div>
				      		<div class="col-sm-4">
					      		<div class="name_car_price">
					      			<h3 class="name_price">Honda CR-V</h3>
					      			<h4 class="price_start">Rp. 10.000.000.000</h4>
				      			</div>
				      		</div>
				      		<div class="col-sm-3">
					      		<div class="box_link_price">
					      			<a href="#" class="box_price download_brocure btn btn-danger btn-lg">Download Brosur</a>
					      			<a href="product.html" class="box_price view_product btn btn-info btn-lg">Lihat Produk</a>
					      			<a href="order.html" class="box_price order_link btn btn-success btn-lg">Order Now</a>
					      		</div>
					      	</div>
			      		</div>
			      	</div>
			      	<div class="table_price table-responsive">
			      		<table class="table table-hover">
			      			<tr>
			      				<th>Tipe</th>
			      				<th>Manual</th>
			      				<th>Automatic</th>
			      			</tr>
			      			<tr>
			      				<td>Tipe 1</td>
			      				<td>Harga Manual 1</td>
			      				<td>Harga Automatic 1</td>
			      			</tr>
			      			<tr>
			      				<td>Tipe 2</td>
			      				<td>Harga Manual 2</td>
			      				<td>Harga Automatic 2</td>
			      			</tr>
			      			<tr>
			      				<td>Tipe 3</td>
			      				<td>Harga Manual 3</td>
			      				<td>Harga Automatic 3</td>
			      			</tr>
			      		</table>
			      	</div>
			      </div>
			    </div>
			  </div-->
			</div>
    	</div>
    </section>