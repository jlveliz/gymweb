@extends('layout.admin')

@section('title','Ver  Miembro /')

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 class="animated fadeIn">Miembros</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" ><a href="{{ route('admgym.members.index') }}"> <i class="fa fa-list"></i> Listado</a></li>
					    <li role="presentation" class="active"><a href="#showMember" aria-controls="showMember" role="tab" data-toggle="tab"><i class="fa fa-eye"></i> Ver</a></li>
					</ul>
					<div class="tab-content tab-gym-index">
						<div role="tabpanel" class="tab-pane active" id="showMember">
							<h3 class="animated fadeIn">{{$member->name}} {{$member->last_name}}</h3>
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
									<div class="profile-img" style="background-image:url(@if($member->photo)'{{ asset($member->photo) }}'@else'{{ asset("public/img/default-user.png") }}'@endif) " alt="{{$member->name}} {{$member->last_name}}" title="{{$member->name}} {{$member->last_name}}">
							    	</div>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<div class="col-md-6 col-sm-6">
								    	<table class="table">
								    		<tbody>
								    			<tr>
								    				<td><i class="fa fa-key user-profile-icon"></i> <b> Cédula:</b> {{$member->identity_number}}</td>
								    			</tr>
								    			<tr>
								    				<td><i class="fa fa-envelope-o user-profile-icon"></i> <b> Email:</b>  {{$member->email}}</td>
								    			</tr>
								    			@if ($member->gender == 'male')
								    				<tr>
								    					<td><i class="fa fa-mars"></i> <b> Género:</b>  Masculino</td>
								    				</tr>
								    			@endif
								    			@if ($member->gender == 'female')
								    				<tr>
								    					<td><i class="fa fa-venus"></i> <b> Género:</b>  Femenino</td>
								    				</tr>
								    			@endif
								    			<tr>
								    				<td><i class="fa fa-birthday-cake user-profile-icon"></i>  <b> Fecha de Nacimiento:</b> {{$member->birth_date}}</td>
								    			</tr>
								    			<tr>
								    				<td><i class="fa fa-sign-in user-profile-icon"></i> <b> Fecha de Ingreso:</b>{{$member->admission_date}}</td>
								    			</tr>
								    			<tr>
								    				<td>
								    					<i class="fa fa-phone user-profile-icon"></i> <b>Telefono:</b> {{$member->phone}}  
								    					@if ($member->mobile)
								    					/ <i class="fa fa-mobile user-profile-icon"></i> <b>Móvil:</b> {{$member->mobile}}</td>
				                        				@endif
								    				</td>
								    			</tr>
								    		</tbody>
								    	</table>
									</div>
									<div class="col-md-6 col-sm-6">
								    	<table class="table">
								    		<tbody>
								    			<tr>
								    				<td><i class="fa fa-users"></i> <b>Membresía: </b> {{$member->current_membership() ? $member->current_membership()->type->name : '-' }}</td>
								    			</tr>
								    			<tr>
								    				<td><i class="fa fa-power-off"></i> <b>Estado Membresía: </b> {{$member->current_membership() ? $member->current_membership()->membership_state_phisical == 0? 'Caducado' : 'Activo'  : '-'}}</td>
								    			</tr>
								    		</tbody>
								    	</table>
									</div>
								</div>
							</div>
							<div class="row">
								<hr>
								<div class="clearfix"></div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<h4><b>Membresias</b></h4>
									<div class="" role="tabpanel" data-example-id="togglable-tabs">
				                        <ul id="myTab" class="nav nav-tabs" role="tablist">
				                          <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="tab_content2" data-toggle="tab" aria-expanded="false"> <i class="fa fa-history"></i> Historial</a>
				                          </li>
				                          @if (!$member->current_membership())
				                          	<li role="presentation" >
				                          		<a class="tab-primary" href="{{ route('admgym.members.memberships.create',$member->id) }}" aria-expanded="true"> <i class="fa fa-plus"></i> Crear</a>
				                          	</li>
				                          	@endif
				                        </ul>
				                        <div id="myTabContent" class="tab-content tab-gym-index">
				                        	<div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
					                          	<table id="memberships" class="table table-gym table-striped">
					                          		<thead>
					                          			<tr>
					                          				<th class="text-center">Tipo de membresia</th>
					                          				<th class="text-center">Estado físico</th>
					                          				<th class="text-center">Estado economico</th>
					                          				<th class="text-center">Periodo desde / hasta</th>
					                          				<th class="text-center">Acción</th>
					                          			</tr>
					                          		</thead>
					                          		<tbody>
					                          			@foreach ($member->memberships()->orderBy('id','desc')->get() as $membership)
						                          			<tr>
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
						                          				<td>{!!$membership->period_from!!} / {!!$membership->period_to!!}</td>
						                          				
						                          				<td>
						                          					<div class="btn-group">
						                          						<button  data-toggle="dropdown" id="dropdownAssistance" type="button" class="btn btn-default btn-xs"> <i class="fa fa-calendar"></i> Asistencias <span class="caret"></span></button>
						                          						<ul role="menu" class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownAssistance">
						                          							@if ($membership->membership_state_phisical == '1')
						                          								<li><a href="" class="add-assistance" title="Agregar Asistencia">Agregar</a></li>
						                          							@endif
						                          							<li><a  data-toggle="modal" data-target="#assistanceModal"  href="{{ route('admgym.members.memberships.assistances.index',[$member->id,$membership->id]) }}" class="view-asissistance" title="Listado de asistencias">Listado</a></li>
						                          						</ul>
						                          					</div>
						                          					<div class="btn-group">
							                          					<button data-toggle="dropdown"  type="button" class="btn btn-success dropdown-toggle btn-xs" id="dropdownPay"><i class="fa fa-dollar" alt="Menú de pagos" title="Menú de pagos"></i> Pagos <span class="caret"></span></button>
							                          					<ul role="menu" class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownPay">
							                          					@if ($membership->membership_state_economic == '1' || $membership->membership_state_economic == '2')
							                          						<li><a href="{{ route('admgym.members.memberships.payments.create',[$member->id,$membership->id]) }}" title="Pagar o abonar la membresia">Pagar</a>
							                          						</li>
							                          					@endif
							                          						<li>
							                          							<a data-toggle="modal" data-target="#paymentModal" href="{{ route('admgym.members.memberships.payments.index',[$member->id,$membership->id]) }}" title="Ver el historial de pagos realizados a la membresia">Ver Pagos</a>
							                          						</li>
							                          					</ul>
						                          					</div>
						                          					@if($membership->membership_state_phisical == '1' && count($membership->assistances) > 0)
						                          						<div class="btn-group">
							                          						<form action="{{route('admgym.members.memberships.update',[$member->id,$membership->id]) }}" method="POST">
					                          								<input type="hidden" name="_token" value="{{ csrf_token() }}">
																			<input type="hidden" name="_method" value="PUT">
																			<input type="hidden" name="membership_state_phisical" value="0">
							                          						<button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-window-close"></i> Caducar</button>
																			</form>
						                          						</div>

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
							<div class="clearfix"></div>
							<div class="ln_solid"></div>
							<div class="form-group">
		                     <a class="btn btn-info" href="{{ route('admgym.members.index') }}"><i class="fa fa-arrow-left m-right-xs"></i> Retornar</a>
							 <a class="btn btn-submit" href="{{ route('admgym.members.edit',$member->id) }}"><i class="fa fa-edit m-right-xs"></i>Editar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (count($member->current_membership()))	
		<!-- Modal JOB -->
		<div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content ">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Agregar día de trabajo</h4>
		      </div>
			 <form action="{{ route('admgym.members.memberships.assistances.store',[$member->id,$member->current_membership()->id]) }}" method="POST">
		      <div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="membership_id" value="{{ $member->current_membership()->id }}">
					<input type="hidden" name="length_secuence_day" value="{{ $member->current_membership()->getNextSecuence() }}">
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
		<div class="modal fade" id="assistanceModal" tabindex="-1" role="dialog" aria-labelledby="assistanceModal">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content ">
		     
			
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="payModal">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content ">
		     
			
		    </div>
		  </div>
		</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/jquery.dataTables.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/buttons.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/fixedHeader.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/responsive.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/scroller.bootstrap.min.css') }}" />

<style type="text/css">
	.daterangepicker{
		z-index: 10000;
	}
</style>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('public/js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}"></script>
 <script src="{{ asset('public/js/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/dataTables.bootstrap.js') }}"></script>
 <script src="{{ asset('public/js/datatables/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/buttons.bootstrap.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/jszip.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/pdfmake.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/vfs_fonts.js') }}"></script>
 <script src="{{ asset('public/js/datatables/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/buttons.print.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/dataTables.fixedHeader.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/dataTables.keyTable.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/responsive.bootstrap.min.js') }}"></script>
 <script src="{{ asset('public/js/datatables/dataTables.scroller.min.js') }}"></script>
 <script src="{{ asset('public/js/member/app.js') }}"></script>
@endsection