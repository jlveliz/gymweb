@extends('layout.admin')

@section('title','Miembros')

@section('js')
 <script src="{{ asset('public//js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
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
				</div>
				<div class="x_content">
					<ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" ><a href="{{ route('admgym.members.index') }}"> <i class="fa fa-list"></i> Listado</a></li>
					    <li role="presentation" class="active"><a href="#createMember" aria-controls="createMember" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Crear</a></li>
					</ul>

					<div class="tab-content tab-gym-index">
						<div role="tabpanel" class="tab-pane active" id="createMember">
							<form method="post" class="form-label-left animated fadeIn" action="{{ route('admgym.members.store') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="row">
									<div class="form-group col-md-4 col-sm-4 col-xs-4 @if($errors->has('name')) has-error @endif">
										<label class="control-label">Nombre: <span class="text-danger">*</span></label>
									    <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" autofocus>
									    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif 
									</div>
									<div class="form-group col-md-4 col-sm-4 col-xs-4 @if ($errors->has('last_name')) has-error @endif">
										<label class="control-label">Apellido: <span class="text-danger">*</span></label>
									    <input type="text" class="form-control" placeholder="Apellido" name="last_name" value="{{ old('last_name') }}">
									    @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
									</div>
									<div class="form-group col-md-4 col-sm-4 col-xs-4 @if ($errors->has('identity_number')) has-error @endif">
										<label class="control-label">Cédula: <span class="text-danger">*</span></label>
									     <input type="text" class="form-control" placeholder="Cédula" name="identity_number" value="{{ old('identity_number') }}">
									     @if ($errors->has('identity_number')) <p class="help-block">{{ $errors->first('identity_number') }}</p> @endif
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4 col-sm-4 col-xs-4 @if ($errors->has('email')) has-error @endif">
										<label class="control-label">Email: <span class="text-danger">*</span></label>
									    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
									    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif 
									</div>
									<div class="form-group col-md-2 col-sm-2 col-xs-4 @if ($errors->has('phone')) has-error @endif">
										<label class="control-label">Teléfono: <span class="text-danger">*</span></label>
								     	<input type="text" class="form-control" placeholder="Teléfono" name="phone" value="{{ old('phone') }}">
								     	@if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
									</div>
									<div class="form-group col-md-2 col-sm-2 col-xs-4 @if ($errors->has('mobile')) has-error @endif">
										<label class="control-label">Móvil:</label>
								     	<input type="text" class="form-control" placeholder="Móvil" name="mobile" value="{{ old('mobile') }}">
								     	@if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif
									</div>
									<div class="form-group col-md-4 col-sm-4 col-xs-6 @if ($errors->has('height') || $errors->has('weight')) has-error @endif">
										<label class="control-label col-md-12 col-sm-12 col-xs-12 no-padding">Medidas:  <small>(cm - lb)</small>  <span class="text-danger">*</span></label>
										<div class="form-group col-md-6 col-sm-6 col-xs-4 no-padding-left ">
									     	<input type="text" class="form-control" placeholder="Altura" name="height" value="{{ old('height') }}">
									     	@if ($errors->has('height')) <p class="help-block">{{ $errors->first('height') }}</p> @endif
										</div>
										<div class="form-group col-md-6 col-sm-6 col-xs-4 no-padding">
									     	<input type="text" class="form-control" placeholder="Peso" name="weight" value="{{ old('weight') }}">
									     	@if ($errors->has('weight')) <p class="help-block">{{ $errors->first('weight') }}</p> @endif
										</div>
									</div>
								</div>
								
								<div class="row">
									
									<div class="form-group col-md-2 col-sm-2 col-xs-6 @if ($errors->has('birth_date')) has-error @endif">
										<label class="control-label">F. nacimiento:<span class="text-danger">*</span> </label>
								     	<input type="text" class="form-control" placeholder="F. de nacimiento" name="birth_date" value="{{ old('birth_date') }}" id="birth_date">
								     	@if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
									</div>
									<div class="form-group col-md-2 col-sm-2 col-xs-5 @if ($errors->has('admission_date')) has-error @endif">
										<label class="control-label">Fecha de ingreso: <span class="text-danger">*</span></label>
								     	<input type="text" class="form-control" placeholder="F. de ingreso" name="admission_date" id="admission_date" value="{{ old('admission_date') }}">
								     	@if ($errors->has('admission_date')) <p class="help-block">{{ $errors->first('admission_date') }}</p> @endif
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="ln_solid"></div>
								<div class="form-group">
			                      	<div class="col-md-6 col-sm-6 col-xs-12">
			                        	<a href="{{ route('admgym.members.index') }}" class="btn btn-primary"> <i class="fa fa-ban"></i> Cancelar</a>
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

@endsection
