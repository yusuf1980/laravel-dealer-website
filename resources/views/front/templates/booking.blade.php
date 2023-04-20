	<section class="booking_section body_column content_product_dua">
	@foreach (Alert::getMessages() as $type => $messages)
		@foreach ($messages as $message)
			<div class="alert alert-{{ $type }}">{{ $message }}</div>
		@endforeach
	@endforeach
    <div class="content_page">
      {!! $page->content !!}
    </div>
    <div class="booking_form">
      {!! Form::open(['url' => 'contact/booking', 'method'=>'post', 'class'=>'form-horizontal']) !!}
      	<input name="slug" type="hidden" value="{{$page->slug}}">
        <input type="hidden" value="{{$page->email}}" name="mail_pen">

        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
          <label for="name" class="col-sm-3 control-label">Nama*</label>
          <div class="col-sm-8">
            <input type="text" name="nama" class="form-control" id="name" placeholder="Nama" value="{{ old('nama') }}">
            @if ($errors->has('nama'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('nama') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
          <label for="phone" class="col-sm-3 control-label">Nomor Telephone / Handphone*</label>
          <div class="col-sm-8">
            <input type="text" name="telepon" class="form-control" id="phone" placeholder="Isi dengan angka dan tanpa jarak spasi" value="{{ old('telepon') }}">
            @if ($errors->has('telepon'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('telepon') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="col-sm-3 control-label">Email*</label>
          <div class="col-sm-8">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
            @if ($errors->has('email'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('email') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">
          <label for="tipe" class="col-sm-3 control-label">Jenis Mobil*</label>
          <div class="col-sm-8">
            <input type="text" name="tipe" class="form-control" id="tipe" placeholder="Jenis Mobil, misal: Honda Jazz, atau Honda Brio, etc." value="{{ old('tipe') }}">
            @if ($errors->has('tipe'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('tipe') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
          <label for="stnk" class="col-sm-3 control-label">Atas Nama STNK</label>
          <div class="col-sm-8">
            <input type="text" name="stnk" class="form-control" id="stnk" placeholder="Atas nama yang tercantum pada STNK" value="{{ old('stnk') }}">
            @if ($errors->has('stnk'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('stnk') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('nopol') ? ' has-error' : '' }}">
          <label for="nopol" class="col-sm-3 control-label">Nopol</label>
          <div class="col-sm-8">
            <input type="text" name="nopol" class="form-control" id="nopol" placeholder="Nomor Polisi Kendaraan" value="{{ old('nopol') }}">
            @if ($errors->has('nopol'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('nopol') }}</strong>
		        </span>
		    @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('tanggal_service') ? ' has-error' : '' }}">
          <label for="service-date" class="col-sm-3 control-label">Tangggal Service*</label>
          <div class="col-sm-8">
            <input type="text" name="tanggal_service" class="form-control" id="service-date" placeholder="Pilih tanggal akan melakukan service" value="{{ old('tanggal_service') }}">
            @if ($errors->has('tanggal_service'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('tanggal_service') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
          <label for="deskripsi" class="col-sm-3 control-label">Keterangan</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8" placeholder="Isi keterangan lengkap mobil yang ingin anda order. Nama Mobil, Tipe Mobil, Manual/Automatic, Kota Anda Tinggal"> {{ old('deskripsi') }} </textarea>
            @if ($errors->has('deskripsi'))
		        <span class="help-block">
		        	<strong>{{ $errors->first('deskripsi') }}</strong>
		        </span>
		    @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-8">
            <button type="submit" class="btn btn-info btn-lg">Booking Now</button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </section>