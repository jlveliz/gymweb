@extends('layout.master')

@section('title','Edición de Clientes /')

@section('title-page')
	<h3>Clientes <small> Los que se ejercitan con nosotros.</small></h3>
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
			<div class="x_panel">
				<div class="x_title">
					<h2>Editar <small>Clientes</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" class="form-horizontal form-label-left" action="{{ route('clients.update',$client->id) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="key" value="{{$client->id}}">
						<div class="row">
							<div class="form-group col-md-4 col-sm-4 col-xs-12">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Nombre </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 if @if($errors->has('name')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ $client->name }}" autofocus>
							     	 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Apellido </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('last_name')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Apellido" name="last_name" value="{{ $client->last_name }}">
							     	@if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Cédula </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('identity_number')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Cédula" name="identity_number" value="{{ $client->identity_number }}">
							     	@if ($errors->has('identity_number')) <p class="help-block">{{ $errors->first('identity_number') }}</p> @endif
							     </div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Email </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('email')) has-error @endif">
							     	<input type="email" class="form-control" placeholder="Email" name="email" value="{{ $client->email }}">
							     	@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Teléfono </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('phone')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Teléfono" name="phone" value="{{ $client->phone }}">
							     	@if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Móvil </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('mobile')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Móvil" name="mobile" value="{{ $client->mobile }}">
							     	@if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif
							     </div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Altura <small>(Centimetros)</small></label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('height')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Altura" name="height" value="{{ $client->height }}">
							     	@if ($errors->has('height')) <p class="help-block">{{ $errors->first('height') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Peso <small>(Libras)</small> </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('weight')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Peso" name="weight" value="{{ $client->weight }}">
							     	@if ($errors->has('weight')) <p class="help-block">{{ $errors->first('weight') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha de nacimiento <small></small> </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('birth_date')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Fecha de nacimiento" name="birth_date" id="birth_date" value="{{ $client->birth_date }}">
							     	@if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
							     </div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha de ingreso</label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('admission_date')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Fecha de ingreso" name="admission_date" id="admission_date" value="{{ $client->admission_date }}">
							     	@if ($errors->has('admission_date')) <p class="help-block">{{ $errors->first('admission_date') }}</p> @endif
							     </div>
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

