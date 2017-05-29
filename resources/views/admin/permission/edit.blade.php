@extends('layout.admin')

@section('title','Edición de Permisos /')

@section('title-page')
	<h3>Permisos <small> permisos que conforman un rol.</small></h3>
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Editar <small>Permisos</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" class="form-horizontal form-label-left" action="{{ route('admgym.permissions.update',$permission->id) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="key" value="{{$permission->id}}">
						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Nombre </label>
						     <div class="col-md-9 col-sm-9 col-xs-12 if @if($errors->has('name')) has-error @endif">
						     	<input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ $permission->name }}" autofocus>
						     	 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
						     </div>
						</div>
						<div class="form-group col-md-6 col-sm-6 col-xs-12 ">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre a mostrar </label>
						     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('display_name')) has-error @endif">
						     	<input type="text" class="form-control" placeholder="Nombre a mostrar" name="display_name" value="{{ $permission->display_name }}">
						     	@if ($errors->has('display_name')) <p class="help-block">{{ $errors->first('display_name') }}</p> @endif
						     </div>
						</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12 ">
							<label class="control-label col-md-1 col-sm-1 col-xs-12">Descripción </label>
						     <div class="col-md-11 col-sm-11 col-xs-12 @if($errors->has('description')) has-error @endif">
						     	<input type="text" class="form-control" placeholder="Descripción" name="description" value="{{ $permission->description }}">
						     	@if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
						     </div>
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group">
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                        	<a href="{{ route('admgym.permissions.index') }}" class="btn btn-primary">Cancelar</a>
	                        	<button type="submit" class="btn btn-success">Guardar</button>
	                      	</div>
                    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection

