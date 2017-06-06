@extends('layout.admin')

@section('title','Permisos')

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 class="animated fadeIn">Permisos</h2> 
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
					    <li><a href="{{ route('admgym.permissions.index') }}"> <i class="fa fa-list"></i> Listado</a></li>
					      <li role="presentation" class="active"><a href="#" aria-controls="listPermissions" role="tab" data-toggle="tab"><i class="fa fa-edit"></i> Editar</a>
	                    </li>
					</ul>
					<div class="tab-content tab-gym-index">
						<div role="tabpanel" class="tab-pane active" id="listPermissions">
							<form method="post" class="form-label-left animated fadeIn" action="{{ route('admgym.permissions.update',$permission->id) }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="key" value="{{$permission->id}}">
								<div class="form-group col-md-3 col-sm-3 col-xs-4 @if($errors->has('name')) has-error @endif">
									<label class="control-label">Nombre: <span class="text-danger">*</span></label>
							     	<input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ $permission->name }}" autofocus>
							     	 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
								</div>
								<div class="form-group col-md-3 col-sm-3 col-xs-4 @if($errors->has('display_name')) has-error @endif">
									<label class="control-label">Nombre a mostrar: <span class="text-danger">*</span></label>
							     	<input type="text" class="form-control" placeholder="Nombre a mostrar" name="display_name" value="{{ $permission->display_name }}">
							     	@if ($errors->has('display_name')) <p class="help-block">{{ $errors->first('display_name') }}</p> @endif
								</div>
								<div class="form-group col-md-6 col-sm-6 col-xs-4 @if($errors->has('description')) has-error @endif">
									<label class="control-label">Descripción </label>
							     	<input type="text" class="form-control" placeholder="Descripción" name="description" value="{{ $permission->description }}">
							     	@if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
								</div>
								<div class="clearfix"></div>
								<div class="ln_solid"></div>
								<div class="form-group">
			                      	<div class="col-md-6 col-sm-6 col-xs-12">
			                        	<a href="{{ route('admgym.permissions.index') }}" class="btn btn-primary"><i class="fa fa-ban"></i> Cancelar</a>
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

