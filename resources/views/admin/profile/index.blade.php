@extends('layout.admin')

@section('title','Perfil')

@section('js')
 <script src="{{ asset('public/js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/js/member/app.js') }}" type="text/javascript"></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public//css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 class="animated fadeIn">Miembros</h2>
					<div class="clearfix"></div>
					@if (Session::has('mensaje'))
						<div class="alert alert-dismissible @if(Session::get('tipo_mensaje') == 'success') alert-info  @endif @if(Session::get('tipo_mensaje') == 'error') alert-danger  @endif" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							{{session('mensaje')}}
					    </div>
						<div class="clearfix"></div>
					@endif
				</div>
				<div class="x_content">
					<ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" ><a href="{{ route('members.index') }}"> <i class="fa fa-list"></i> Listado</a></li>
					    <li role="presentation" class="active"><a href="#editMember" aria-controls="editMember" role="tab" data-toggle="tab"><i class="fa fa-pencil"></i> Editar</a></li>
					</ul>

					<div class="tab-content tab-gym-index">
						<div role="tabpanel" class="tab-pane active" id="editMember">
							<form method="post" class="form-label-left animated fadeIn" action="{{ route('members.update',Auth::user()->id) }}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="key" value="{{Auth::user()->id}}">
								<div class="col-md-3 col-sm-3 col-xs-12">
						    		<a href="#" id="profile-section">
						    			<div class="profile-img" style="background-image:url(@if(Auth::user()->photo)'{{ asset(Auth::user()->photo) }}'@else'{{ asset("public/img/default-user.png") }}'@endif) " alt="" title="">
						    			</div>
						    			<div class="middle">
				                        	<div class="text">Subir una imagen</div>
				                    	</div>
						    		</a>
						    		<input type="file" id="file-profile-upload" name="photo" type="file" accept="image/*"/ style="display: none">
						    		@if ($errors->has('photo')) <p class="help-block">{{ $errors->first('photo') }}</p> @endif
								</div>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<div class="row">
										<div class="form-group col-md-2 col-sm-2 col-xs-4 @if ($errors->has('identity_number')) has-error @endif">
											<label class="control-label">Cédula: <span class="text-danger">*</span></label>
										     <input type="text" class="form-control" placeholder="Cédula" name="identity_number" value="{{ Auth::user()->identity_number }}">
										     @if ($errors->has('identity_number')) <p class="help-block">{{ $errors->first('identity_number') }}</p> @endif
										</div>
										<div class="form-group col-md-4 col-sm-4 col-xs-4 @if($errors->has('name')) has-error @endif">
											<label class="control-label">Nombre: <span class="text-danger">*</span></label>
										    <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ Auth::user()->name }}" autofocus>
										    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif 
										</div>
										<div class="form-group col-md-4 col-sm-4 col-xs-4 @if ($errors->has('last_name')) has-error @endif">
											<label class="control-label">Apellido: <span class="text-danger">*</span></label>
										    <input type="text" class="form-control" placeholder="Apellido" name="last_name" value="{{ Auth::user()->last_name }}">
										    @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
										</div>
										<div class="form-group col-md-2 col-sm-2 col-xs-4 @if ($errors->has('gender')) has-error @endif">
											<label class="control-label">Género: <span class="text-danger">*</span></label>
											<select name="gender" id="gender" class="form-control">
												<option value="null" @if(Auth::user()->gender == 'null') selected @endif>--Seleccione--</option>
												<option value="male" @if(Auth::user()->gender == 'male') selected @endif>Masculino</option>
												<option value="female" @if(Auth::user()->gender == 'female') selected @endif>Femenino</option>
											</select>
										    @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4 col-sm-4 col-xs-4 @if ($errors->has('email')) has-error @endif">
											<label class="control-label">Email: <span class="text-danger">*</span></label>
										    <input type="email" class="form-control" placeholder="Email" name="email"  value="{{ Auth::user()->email }}">
										    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif 
										</div>
										<div class="form-group col-md-2 col-sm-2 col-xs-4 @if ($errors->has('phone')) has-error @endif">
											<label class="control-label">Teléfono: <span class="text-danger">*</span></label>
									     	<input type="text" class="form-control" placeholder="Teléfono" name="phone" value="{{ Auth::user()->phone }}">
									     	@if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
										</div>
										<div class="form-group col-md-2 col-sm-2 col-xs-4 @if ($errors->has('mobile')) has-error @endif">
											<label class="control-label">Móvil:</label>
									     	<input type="text" class="form-control" placeholder="Móvil" name="mobile" value="{{ Auth::user()->mobile }}">
									     	@if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif
										</div>
										<div class="form-group col-md-4 col-sm-4 col-xs-6 @if ($errors->has('address')) has-error @endif">
											<label class="control-label col-md-12 col-sm-12 col-xs-12 no-padding">Dirección: <span class="text-danger">*</span></label>
											<input type="text" class="form-control" placeholder="Dirección" name="address" value="{{ Auth::user()->address
											 }}">
											@if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4 col-sm-4 col-xs-6 @if ($errors->has('birth_date')) has-error @endif">
											<label class="control-label">F. nacimiento:<span class="text-danger">*</span> </label>
									     	<input type="text" class="form-control" placeholder="F. de nacimiento" name="birth_date" value="{{ Auth::user()->birth_date }}" id="birth_date">
									     	@if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
										</div>
										<div class="form-group col-md-4 col-sm-4 col-xs-5 @if ($errors->has('admission_date')) has-error @endif">
											<label class="control-label">Fecha de ingreso: <span class="text-danger">*</span></label>
									     	<input type="text" class="form-control" placeholder="F. de ingreso" name="admission_date" id="admission_date" value="{{ Auth::user()->admission_date }}">
									     	@if ($errors->has('admission_date')) <p class="help-block">{{ $errors->first('admission_date') }}</p> @endif
										</div>
									</div>
									
								</div>
								<div class="clearfix"></div>
								<div class="ln_solid"></div>
								<div class="form-group">
			                      	<div class="col-md-6 col-sm-6 col-xs-12">
			                        	<a href="{{ route('members.index') }}" class="btn btn-primary"> <i class="fa fa-ban"></i> Cancelar</a>
			                        	<button type="submit" class="btn btn-submit"><i class="fa fa-save"></i> Guardar</button>
			                      	</div>
		                    	</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop