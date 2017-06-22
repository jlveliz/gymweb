@extends('layout.admin')
@section('title','Reporte de Miembros')
@section('js')
 <script src="{{ asset('public//js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/js/memberreports/app.js') }}" type="text/javascript"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public//css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
@endsection
@section('content-page')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2 class="animated fadeIn">Reporte de miembros</h2> 
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#assistances" aria-controls="createPermission" role="tab" data-toggle="tab"> <i class="fa fa-calendar"></i> Asistencias</a></li>
				</ul>
				<div class="tab-content tab-gym-index">
					<div role="tabpanel" class="tab-pane active" id="assistances">
						<div class="panel panel-default animated fadeIn">
							<div class="panel-heading"><i class="fa fa-filter"></i> Filtros</div>
							<div class="panel-body">
								<form action="{{ route('admreports.members.assistances') }}" method="GET">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="row">
										<div class="form-group col-md-3 col-sm-3 col-xs-6">
											<label class="control-label" for="date_from">Desde: <span class="text-danger">*</span></label>
											<div class='input-group date' id='date_from'>
												<input type="text" name="date_from" value="" class="form-control">
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
										</div>
										
										<div class="form-group col-md-3 col-sm-3 col-xs-6">
											<label class="control-label" for="date_to">Hasta <span class="text-danger">*</span></label>
											<div class='input-group date' id='date_to'>
												<input type="text" name="date_to" value="" class="form-control">
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
										</div>

										<div class="form-group col-md-4 col-sm-4 col-xs-6">
											<label for="date_to">Miembro</label>
											<select name="member" id="member" class="form-control">
												<option value="">Seleccione</option>
												@foreach ($members as $member)
												<option value="{{$member->id}}"> {{$member->name}} {{$member->last_name}} </option>
												@endforeach	
											</select>
										</div>

										<div class="form-group col-md-2 col-sm-2 col-xs-6">
											<br>
											<button class="btn btn-submit" style="margin-top: 4px"><i class="fa fa-search"></i> Buscar</button>
										</div>
									</div>
								</form>

								<hr>
								<div class="row">
									<table class="table table-striped table-gym animated fadeIn">
										<thead>
											<tr>
												<th>Miembro</th>
												<th>Membresia</th>
												<th>Total Asistencias</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th colspan="3" class="text-center">Seleccione los filtros para buscar</th>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

