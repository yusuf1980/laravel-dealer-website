						
							<div class="title_contact">
								<img src="{{url('images/lapor.png')}}" alt="Lapor/Pengaduan">
							</div>
							<div class="content_contact">
								{!! Form::open(['url' => 'contact/contact', 'method'=>'post', 'class'=>'form-horizontal']) !!}
									<input name="slug" type="hidden" value="{{$page->slug}}">
								
									<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									    <label for="inputEmail3" class="col-sm-2 control-label">Nama*</label>
									    <div class="col-sm-10">
									      	<input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Nama" value="{{ old('name') }}" required>
									      	@if ($errors->has('name'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('name') }}</strong>
		                                        </span>
		                                    @endif
									    </div>
									</div>
									<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									    <label for="email" class="col-sm-2 control-label">Email*</label>
									    <div class="col-sm-10">
									      	<input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
									      	@if ($errors->has('email'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('email') }}</strong>
		                                        </span>
		                                    @endif
									    </div>
									</div>
									<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
									    <label for="website" class="col-sm-2 control-label">Website</label>
									    <div class="col-sm-10">
									      	<input name="website" type="text" class="form-control" id="website" placeholder="Website" value="{{ old('website') }}">
									      	@if ($errors->has('website'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('website') }}</strong>
		                                        </span>
		                                    @endif
									    </div>
									</div>
									<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
									    <label for="description" class="col-sm-2 control-label">Isi Pesan*</label>
									    <div class="col-sm-10">
									      	<textarea name="description" id="" rows="10" class="form-control" required>{{ old('description') }}</textarea>
									      	@if ($errors->has('description'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('description') }}</strong>
		                                        </span>
		                                    @endif
									    </div>
									</div>
									<div class="form-group">
									    <div class="col-sm-offset-2 col-sm-10">
									      	<button type="submit" class="btn btn-success btn-lg">Kirim Laporan/Pengaduan</button>
									    </div>
									</div>
								{!! Form::close() !!}
							</div>
						