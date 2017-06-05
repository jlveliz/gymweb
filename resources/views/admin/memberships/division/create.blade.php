@extends('layout.admin')

@section('title','División')

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
								<label class="control-label">Nombre <span class="text-danger">*</span></label>
							     	<input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" autofocus>
							     	 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12 @if($errors->has('description')) has-error @endif">
								<label class="control-label">Descripción <span class="text-danger">*</span></label>
						     	<input type="text" class="form-control" placeholder="Descripción" name="description" value="{{ old('description') }}">
						     	@if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
							</div>
							
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group">
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                        	<a href="{{ route('admgym.memberships.divisions.index') }}" class="btn btn-primary"><i class="fa fa-ban"></i> Cancelar</a>
	                        	<button type="submit" class="btn btn-submit"><i class="fa fa-save"></i> Guardar</button>
	                      	</div>
                    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
