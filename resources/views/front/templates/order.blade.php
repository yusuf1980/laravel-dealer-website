  <section class="global_section body_column body_home">
  	@foreach (Alert::getMessages() as $type => $messages)
		@foreach ($messages as $message)
			<div class="alert alert-{{ $type }}">{{ $message }}</div>
		@endforeach
	@endforeach
    <div class="order_form">
      {!! Form::open(['url' => 'contact/order', 'method'=>'post', 'class'=>'form-horizontal']) !!}
      	<input name="slug" type="hidden" value="{{$page->slug}}">
        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
          <label for="nama" class="col-sm-3 control-label">Nama*</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}">
            @if ($errors->has('nama'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('nama') }}</strong>
		        </span>
		    @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
          <label for="telepon" class="col-sm-3 control-label">Nomor Telephone / Handphone*</label>
          <div class="col-sm-9">
            <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Isi dengan angka dan tanpa jarak spasi" value="{{ old('telepon') }}">
            @if ($errors->has('telepon'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('telepon') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="inputEmail3" class="col-sm-3 control-label">Email*</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ old('email') }}">
            @if ($errors->has('email'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('email') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
          <label for="inputPassword3" class="col-sm-3 control-label">Keterangan*</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="deskripsi" id="" rows="8" placeholder="Isi keterangan lengkap mobil yang ingin anda order. Nama Mobil, Tipe Mobil, Manual/Automatic, Kota Anda Tinggal"> {{ old('deskripsi') }} </textarea>
            @if ($errors->has('deskripsi'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('deskripsi') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-danger btn-lg">Order Now</button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
    
    <div class="content_page">
      {!! $page->content !!}
    </div>
  </section>