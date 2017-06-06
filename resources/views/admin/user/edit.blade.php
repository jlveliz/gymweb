@extends('layout.admin')

@section('title','Usuarios')

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 class="animated fadeIn">Usuarios</h2> 
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
					    <li><a href="{{ route('admgym.users.index') }}"> <i class="fa fa-list"></i> Listado</a></li>
					      <li role="presentation" class="active"><a href="#" aria-controls="listUser" role="tab" data-toggle="tab"><i class="fa fa-edit"></i> Editar</a>
	                    </li>
					</ul>
					<div class="tab-content tab-gym-index">
						<div role="tabpanel" class="tab-pane active" id="listUser">
							<form method="post" class="form-label-left animated fadeIn" action="{{ route('admgym.users.update',$user->id) }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="key" value="{{$user->id}}">
								<div class="form-group col-md-4 col-sm-4 col-xs-12 @if($errors->has('username')) has-error @endif">
									<label class="control-label">Usuario: <span class="text-danger">*</span></label>
							     	<input type="text" class="form-control" placeholder="Usuario" name="username" value="{{ $user->username }}">
							     	 @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
								</div>
								<div class="form-group col-md-4 col-sm-4 col-xs-12 @if($errors->has('password')) has-error @endif">
									<label class="control-label">Clave: <span class="text-danger">*</span></label>
							     	<input type="password" class="form-control" placeholder="Clave" name="password">
							     	@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
								</div>
								<div class="form-group col-md-4 col-sm-4 col-xs-12 @if($errors->has('password_repeat')) has-error @endif">
									<label class="control-label">Repita Clave: <span class="text-danger">*</span></label>
							     	<input type="password" class="form-control" placeholder="Repita Clave" name="password_repeat">
							     	@if ($errors->has('password_repeat')) <p class="help-block">{{ $errors->first('password_repeat') }}</p> @endif
								</div>
								<div class="clearfix"></div>
								<h4 class="animated fadeIn">Roles <span class="text-danger">*</span></h4>
								<div class="clearfix"></div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12 @if($errors->has('roles')) has-error @endif">
									@if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
									@foreach ($roles as $role)
										<div class="checkbox-inline">
											<label><input type="checkbox" value="{{$role->id}}" name="roles[]" @if($role->checked) checked @endif>
		    									{{$role->display_name}}
		  									</label>
										</div>
									@endforeach
								</div>
								<div class="clearfix"></div>
								<div class="ln_solid"></div>
								<div class="form-group">
			                      	<div class="col-md-6 col-sm-6 col-xs-12">
			                        	<a href="{{ route('admgym.users.index') }}" class="btn btn-primary"><i class="fa fa-ban"></i> Cancelar</a>
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

