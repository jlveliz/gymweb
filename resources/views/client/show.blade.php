@extends('layout.master')

@section('title','Ver  Cliente /')

@section('title-page')
	<h3>Clientes</h3>
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>{{$client->name}} {{$client->last_name}}</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
						<div class="profile_img">
							<div id="crop-avatar">
								<img class="img-responsive avatar-view" src="{{ asset('img/default-user.png') }}" alt="Avatar" title="Change the avatar">
							</div>
						</div>
						<h3>{{explode(' ', $client->name)[0]}} {{explode(' ', $client->last_name)[0]}}</h3>
						<ul class="list-unstyled user_data">
                        	<li><i class="fa fa-key user-profile-icon"></i> {{$client->identity_number}}</li>
                        	<li><i class="fa fa-birthday-cake user-profile-icon"></i> {{$client->birth_date}}</li>
                        	<li><i class="fa fa-sign-in user-profile-icon"></i> {{$client->admission_date}}</li>
                        	<li><i class="fa fa-envelope-o user-profile-icon"></i> {{$client->email}}</li>
                        	<li><i class="fa fa-phone user-profile-icon"></i> {{$client->phone}}</li>
                        	@if ($client->mobile)
                        		<li><i class="fa fa-mobile user-profile-icon"></i> {{$client->mobile}}</li>
                        	@endif
                        	<li><i class="fa fa-circle user-profile-icon"></i> {{$client->weight}} Libras</li>
                        	<li><i class="fa fa-circle-o user-profile-icon"></i> {{$client->height}} Centimetros</li>
                        </ul>
                        <a class="btn btn-success" href="{{ route('clients.edit',$client->id) }}"><i class="fa fa-edit m-right-xs"></i>Editar Cliente</a>
                        <a class="btn btn-info" href="{{ route('clients.index') }}"><i class="fa fa-arrow-left m-right-xs"></i> Retornar</a>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
	                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Membresia</a>
	                          </li>
	                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Historial</a>
	                          </li>
	                        </ul>
	                        <div id="myTabContent" class="tab-content">
	                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
	                          	@if (!$client->current_membership())
	                          		<h5 class="text-center col-md-10">No tiene una membresia activa</h5>
	                          		<div class="col-md-2">
	                          			<a href="{{ route('clients.memberships.create',$client->id) }}" class="btn btn-success pull-right"><i class="fa fa-plus"> </i> Crear Membresia</a>	
	                          		</div>	
	                          	@else
	                          		<div class="row">
	                          			<div class="col-md-12 col-sm-12 col-xs-12">
	                          				<ul class="list-unstyled list-inline" style="font-size: 16px">
	                          					<li><i class="fa fa-membership"></i> Membresia: {{$client->current_membership()->type->name}}  </li>
	                          					<li><i class="fa fa-calendar user-profile-icon"></i> Periodos: {!!$client->current_membership()->period_from!!} / {!!$client->current_membership()->period_to!!}</li>
	                          					<li class="@if($client->current_membership()->membership_state_phisical == 0) text-danger @else text-success @endif"><i class="fa fa-check user-profile-icon"></i> @if($client->current_membership()->membership_state_phisical == 0) Caducado @else  Activo  @endif</li>
	                          					<li class="@if($client->current_membership()->membership_state_economic > 1) text-success @else text-danger  @endif"><i class="fa fa-usd user-profile-icon"></i> @if($client->current_membership()->membership_state_economic == 1) Impago @endif @if($client->current_membership()->membership_state_economic == 2) Abonado @endif 
	                          						@if($client->current_membership()->membership_state_economic == 3) Pagado @endif
	                          					</li>
	                          				</ul>
	                          			</div>
	                          		</div>
	                          		<hr>
	                          		<div class="row">
	                          			<div class="text-right">
		                          			<?php 
		                          			
		                          				$lastDayJob =   count($client->current_membership()->assistances) > 0 ? $client->current_membership()->assistances()->orderBy('length_secuence_day','desc')->first()->date_job : null;  
		                          			?>
		                          			<?php if ($lastDayJob != $client->currentDate()): ?>
		                          			<div class="col-md-9 col-sm-3 col-xs-12">
			                          			<button data-toggle="modal" data-target="#jobModal" type="button" class="btn btn-success "><i class="fa fa-plus"> </i> Agregar día de trabajo</button>
	                          				</div>
	                          				<?php endif ?>

	                          				@if (count($client->current_membership()->assistances) > 0)
				                          		<form action="{{ route('clients.memberships.update',[$client->id,$client->current_membership()->id]) }}" method="POST">
				                          			<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="_method" value="PUT">
													<input type="hidden" name="membership_state_phisical" value="0">
				                          			<button type="submit" class="btn btn-danger pull-right"><i class="fa fa-times"> </i> Cerrar Membresia</button>	
				                          		</form>
		                          			@endif
				                        </div>
	                          		</div>	
	                          				
	                          		<table class="table table-striped">
	                          			<thead>
	                          				<tr>
	                          					<th>#</th>
	                          					<th>Día Ejercitado</th>
	                          				</tr>
	                          			</thead>
	                          			<tbody>
	                          				@if (count($client->current_membership()->assistances) > 0)
	                          					@foreach ($client->current_membership()->assistances as $dDetail)
		                          				<tr>
		                          					<td>{{$dDetail->length_secuence_day}}</td>
		                          					<td>{!!$dDetail->date_job!!} </td>
		                          				</tr>
	                          					@endforeach
	                          				@else
	                          					<tr>
	                          						<td colspan="2" class="text-center">No tiene días de trabajo</td>
	                          					</tr>
	                          				@endif
	                          			</tbody>
	                          		</table>
	                          	@endif
	                          
	                          </div>
	                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
	                          	<h2>Membresias anteriores</h2>
	                          	<hr>
	                          	<table class="table table-striped">
	                          		<thead>
	                          			<tr>
	                          				<th>Periodo desde</th>
	                          				<th>Periodo hasta</th>
	                          				<th>Tipo de membresia</th>
	                          				<th>Estado físico</th>
	                          				<th>Estado economico</th>
	                          				<th>Acción</th>
	                          			</tr>
	                          		</thead>
	                          		<tbody>
	                          			@foreach ($client->memberships()->orderBy('id','desc')->get() as $membership)
		                          			<tr>
		                          				<td>{!!$membership->period_from!!}</td>
		                          				<td>{!!$membership->period_to!!}</td>
		                          				<td>{!!$membership->type->name!!}</td>
		                          				<td @if ($membership->membership_state_phisical == '1' ) class="text-success" @else class="text-danger"  @endif> 
		                          					@if ($membership->membership_state_phisical == '1')
		                          					Activa
		                          					@else
		                          					Caducada
		                          					@endif 
		                          				</td>
		                          				<td @if($membership->membership_state_economic == '1') class="text-danger" @endif @if($membership->membership_state_economic == '2') class="text-warning" @endif @if($membership->membership_state_economic == '3') class="text-success" @endif>
		                          					@if($membership->membership_state_economic == '1')
		                          						Impago
		                          					@endif
		                          					@if($membership->membership_state_economic == '2')
		                          						Abonado
		                          					@endif
		                          					@if($membership->membership_state_economic == '3')
		                          						Pagado
		                          					@endif
		                          				</td>
		                          				<td>
		                          					@if ($membership->membership_state_economic == '1' || $membership->membership_state_economic == '2')
		                          						<a href="{{ route('clients.memberships.payments.create',[$client->id,$membership->id]) }}" class="btn btn-success" title="Pagar"> <i class="fa fa-dollar"></i> Pagar</a>
		                          					@endif
		                          				</td>
		                          			</tr>
	                          			@endforeach
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

	@if (count($client->current_membership()))	
		<!-- Modal JOB -->
		<div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content ">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Agregar día de trabajo</h4>
		      </div>
			 <form action="{{ route('clients.memberships.assistances.store',[$client->id,$client->current_membership()->id]) }}" method="POST">
		      <div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="membership_id" value="{{ $client->current_membership()->id }}">
					<input type="hidden" name="length_secuence_day" value="{{ $client->current_membership()->getNextSecuence() }}">
					<div class="row">
		                <div class="col-md-8 col-sm-8 col-xs8 col-xs-offset-2">
		                	<input type="text" class="form-control" name="date_job" id="date_job">
		                </div>
		            </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
			</form>
		    </div>
		  </div>
		</div>
	@endif
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">

<style type="text/css">
	.daterangepicker{
		z-index: 10000;
	}
</style>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#date_job").val(moment().format('YYYY-MM-DD'));
		$("#date_job").datetimepicker({
	        locale: "es",
	        format: "YYYY-MM-DD",
	        maxDate: moment().format('YYYY-MM-DD'),
    	});
	})
</script>
@endsection