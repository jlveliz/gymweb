@extends('layout.master')

@section('title','Edición de Tipo de membresia /')

@section('title-page')
	<h3>Tipo de membresia <small> Contiene la descripción y detalle de una membresia.</small></h3>
@endsection

@section('js')
 <script src="{{ asset('/js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
 <script src="{{ asset('/js/client/app.js') }}" type="text/javascript"></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Editar <small>Tipo de membresia</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" class="form-horizontal form-label-left" action="{{ route('membership-types.update',$membershipType->id) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="key" value="{{$membershipType->id}}">
						<div class="row">
							<div class="form-group col-md-4 col-sm-4 col-xs-12">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Nombre </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 if @if($errors->has('name')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ $membershipType->name }}" autofocus>
							     	 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-5 col-sm-5 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Descipción </label>
							     <div class="col-md-10 col-sm-10 col-xs-12 @if($errors->has('description')) has-error @endif">
							     	<input type="text" class="form-control" placeholder="Descripción" name="description" value="{{ $membershipType->description }}">
							     	@if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
							     </div>
							</div>
							<div class="form-group col-md-3 col-sm-3 col-xs-12 ">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Precio </label>
							     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('price')) has-error @endif">
							     	<input type="number" class="form-control" placeholder="Precio" name="price" value="{{$membershipType->price}}">
							     	@if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
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

