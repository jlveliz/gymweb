@extends('layout.admin')

@section('title','Creación de Usuarios /')

@section('title-page')
	<h3>Usuarios <small> personas que administran el sistema.</small></h3>
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Crear <small>Usuarios</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" class="form-horizontal form-label-left" action="{{ route('users.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group col-md-4 col-sm-4 col-xs-12 @">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Usuario </label>
						     <div class="col-md-9 col-sm-9 col-xs-12 if @if($errors->has('username')) has-error @endif">
						     	<input type="text" class="form-control" placeholder="Usuario" name="username" value="{{ old('username') }}">
						     	 @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
						     </div>
						</div>
						<div class="form-group col-md-4 col-sm-4 col-xs-12 if ">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">Clave </label>
						     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('password')) has-error @endif">
						     	<input type="password" class="form-control" placeholder="Clave" name="password">
						     	@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
						     </div>
						</div>
						<div class="form-group col-md-4 col-sm-4 col-xs-12 ">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Repita Clave </label>
						     <div class="col-md-9 col-sm-9 col-xs-12 @if($errors->has('password_repeat')) has-error @endif">
						     	<input type="password" class="form-control" placeholder="Repita Clave" name="password_repeat">
						     	@if ($errors->has('password_repeat')) <p class="help-block">{{ $errors->first('password_repeat') }}</p> @endif
						     </div>
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<h4>Roles</h4>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12 @if($errors->has('roles')) has-error @endif">
							@if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
							@foreach ($roles as $role)
								<div class="checkbox-inline">
									<label><input type="checkbox" value="{{$role->id}}" name="roles[]">
    									{{$role->display_name}}
  									</label>
								</div>
							@endforeach
						</div>
						<div class="form-group">
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                        	<a href="{{ route('users.index') }}" class="btn btn-primary">Cancelar</a>
	                        	<button type="submit" class="btn btn-success">Guardar</button>
	                      	</div>
                    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection

