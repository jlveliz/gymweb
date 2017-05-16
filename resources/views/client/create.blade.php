@extends('layout.master')

@section('title','Clientes')

@section('title-page')
	<h3 class="animated fadeInDown">Clientes</h3>
@endsection

@section('js')
 <script src="{{ asset('public//js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public//js/client/app.js') }}" type="text/javascript"></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public//css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel  animated fadeInUp">
				<div class="x_title">
					<h2>Crear Cliente <small> | Todos los clientes que se ejercitan con nosotros</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" class="form-label-left" action="{{ route('clients.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="form-group col-md-2 col-sm-3 col-xs-6">
								<label class="control-label">Nombre <span class="required">*</span>: </label>
							    <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" autofocus>
							    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif 
							</div>
							<div class="form-group col-md-2 col-sm-3 col-xs-6">
								<label class="control-label">Apellido </label>
							    <input type="text" class="form-control" placeholder="Apellido" name="last_name" value="{{ old('last_name') }}">
							    @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif 
							</div>
							<div class="form-group col-md-2 col-sm-3 col-xs-6">
								<label class="control-label">Cédula </label>
							     <input type="text" class="form-control" placeholder="Cédula" name="identity_number" value="{{ old('identity_number') }}">
							     @if ($errors->has('identity_number')) <p class="help-block">{{ $errors->first('identity_number') }}</p> @endif
							</div>
							<div class="form-group col-md-2 col-sm-2 col-xs-6">
								<label class="control-label">Email </label>
							    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
							    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif 
							</div>
							<div class="form-group col-md-2 col-sm-3 col-xs-6 ">
								<label class="control-label">Teléfono </label>
						     	<input type="text" class="form-control" placeholder="Teléfono" name="phone" value="{{ old('phone') }}">
						     	@if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
							</div>
							<div class="form-group col-md-2 col-sm-3 col-xs-6">
								<label class="control-label">Móvil </label>
						     	<input type="text" class="form-control" placeholder="Móvil" name="mobile" value="{{ old('mobile') }}">
						     	@if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4 col-sm-4 col-xs-6">
								<label class="control-label col-md-12 col-sm-12 col-xs-12 no-padding">Medidas <small>(Centimetros)</small></label>
								<div class="form-group col-md-5 col-sm-5 col-xs-4 no-padding-left ">
							     	<input type="text" class="form-control" placeholder="Altura" name="height" value="{{ old('height') }}">
							     	@if ($errors->has('height')) <p class="help-block">{{ $errors->first('height') }}</p> @endif
								</div>
								<div class="form-group col-md-5 col-sm-5 col-xs-4 no-padding-left ">
							     	<input type="text" class="form-control" placeholder="Peso" name="weight" value="{{ old('weight') }}">
							     	@if ($errors->has('weight')) <p class="help-block">{{ $errors->first('weight') }}</p> @endif
								</div>
							</div>
							<div class="form-group col-md-2 col-sm-2 col-xs-6">
								<label class="control-label">Fecha de nacimiento <small></small> </label>
						     	<input type="text" class="form-control" placeholder="Fecha de nacimiento" name="birth_date" value="{{ old('birth_date') }}" id="birth_date">
						     	@if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
							</div>
							<div class="form-group col-md-2 col-sm-2 col-xs-5">
								<label class="control-label">Fecha de ingreso</label>
						     	<input type="text" class="form-control" placeholder="Fecha de ingreso" name="admission_date" id="admission_date" value="{{ old('admission_date') }}">
						     	@if ($errors->has('admission_date')) <p class="help-block">{{ $errors->first('admission_date') }}</p> @endif
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group">
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                        	<a href="{{ route('clients.index') }}" class="btn btn-primary">Cancelar</a>
	                        	<button type="submit" class="btn btn-success">Guardar</button>
	                      	</div>
                    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
