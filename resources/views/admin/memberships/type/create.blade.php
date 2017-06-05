@extends('layout.admin')

@section('title','Membresias')

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 class="animated fadeIn">Tipos de membresía</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" ><a href="{{ route('admgym.members.index') }}"> <i class="fa fa-list"></i> Listado</a></li>
					    <li role="presentation" class="active"><a href="#createMember" aria-controls="createMember" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Crear</a></li>
					</ul>

					<form method="post" class="form-horizontal form-label-left  animated fadeIn" action="{{ route('admgym.memberships.types.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group col-md-3 col-sm-3 col-xs-6 @if($errors->has('division_id')) has-error @endif">
							<label class="control-label">División: <span class="text-danger">*</span></label>
							<select name="division_id" id="division_id" class="form-control">
								<option value="null" title="Seleccione una división" alt="Seleccione una división">--Seleccione--</option>
								@foreach ($divisions as $division)
									<option value="{{$division->id}}" alt="{{$division->description}}" title="{{$division->description}}" @if(old('division_id') == $division->id) selected  @endif>{{$division->name}}</option>
								@endforeach
							</select>
						    @if ($errors->has('division_id')) <p class="help-block">{{ $errors->first('division_id') }}</p> @endif
						     
						</div>
						
						<div class="form-group col-md-4 col-sm-4 col-xs-6 @if($errors->has('name')) has-error @endif">
							<label class="control-label">Nombre: <span class="text-danger">*</span></label>
						     <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}">
						    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
						</div>

						<div class="form-group col-md-5 col-sm-5 col-xs-12 @if($errors->has('description')) has-error @endif">
							<label class="control-label">Descipción: <span class="text-danger">*</span></label>
							<input type="text" class="form-control" placeholder="Descripción" name="description" value="{{ old('description') }}">
						     	@if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
						</div>

						<div class="form-group col-md-2 col-sm-2 col-xs-3  @if($errors->has('length_time_number')) has-error @endif">
							<label class="control-label">Número de tiempo: <span class="text-danger">*</span></label>
							<input type="number" class="form-control" placeholder="Tiempo" name="length_time_number" value="{{ old('length_time_number') }}">
						     	@if ($errors->has('length_time_number')) <p class="help-block">{{ $errors->first('length_time_number') }}</p> @endif
						</div>

						<div class="form-group col-md-3 col-sm-3 col-xs-3  @if($errors->has('length_time_mod')) has-error @endif">
							<label class="control-label">Modo de tiempo: <span class="text-danger">*</span></label>
							<select class="form-control" name="length_time_mod" id="length_time_mod">
								<option value="null">--Seleccione--</option>
								<option value="days" @if(old('length_time_mod') == 'days') selected  @endif>Días</option>
								<option value="weeks" @if(old('length_time_mod') == 'weeks') selected  @endif>Semanas</option>
								<option value="months" @if(old('length_time_mod') == 'months') selected  @endif>Meses</option>
							</select>
							@if ($errors->has('length_time_mod')) <p class="help-block">{{ $errors->first('length_time_mod') }}</p> @endif
						</div>

						<div class="form-group col-md-2 col-sm-2 col-xs-3  @if($errors->has('price')) has-error @endif">
							<label class="control-label">Precio: <span class="text-danger">*</span></label>
							<input type="number" min="0.01" step="0.01"  class="form-control" placeholder="Precio" name="price" value="{{ old('price') }}">
						     	@if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
						</div>
						
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group">
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                        	<a href="{{ route('admgym.memberships.types.index') }}" class="btn btn-primary"><i class="fa fa-ban"></i> Cancelar</a>
	                        	<button type="submit" class="btn btn-submit"><i class="fa fa-save"></i> Guardar</button>
	                      	</div>
                    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
