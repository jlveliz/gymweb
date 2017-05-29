@extends('layout.admin')

@section('title','Creación de División /')

@section('title-page')
	<h3>División <small> Contiene la descripción y detalle de una división.</small></h3>
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
					<h2>Crear <small>División</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" class="form-horizontal form-label-left" action="{{ route('admgym.memberships.divisions.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="form-group col-md-3 col-sm-3 col-xs-4 if @if($errors->has('name')) has-error @endif">
								<label class="control-label">Nombre </label>
							     	<input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" autofocus>
							     	 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12 @if($errors->has('description')) has-error @endif">
								<label class="control-label">Descripción </label>
						     	<input type="text" class="form-control" placeholder="Descripción" name="description" value="{{ old('description') }}">
						     	@if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
							</div>
							
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group">
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                        	<a href="{{ route('admgym.memberships.divisions.index') }}" class="btn btn-primary">Cancelar</a>
	                        	<button type="submit" class="btn btn-success">Guardar</button>
	                      	</div>
                    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
