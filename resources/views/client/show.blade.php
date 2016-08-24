@extends('layout.master')

@section('title','Ver  Cliente /')

@section('title-page')
	<h3>Clientes <small> Los que se ejercitan con nosotros.</small></h3>
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Cliente <small> {{$client->name}} {{$client->last_name}} </small></h2>
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
						<div class="profile_title">
							<div class="col-md-6">
								<h2>Reporte de actividades</h2>
							</div>
						</div>
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
	                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cartilla</a>
	                          </li>
	                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Historial</a>
	                          </li>
	                        </ul>
	                        <div id="myTabContent" class="tab-content">
	                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
	                          	@if (!$client->current_book())
	                          		<h5 class="text-center col-md-10">No tiene una cartilla activa</h5>
	                          		<div class="col-md-2">
	                          			<a href="{{ route('clients.books.create',$client->id) }}" class="btn btn-success pull-right"><i class="fa fa-plus"> </i> Crear Cartilla</a>	
	                          		</div>	
	                          	@else
	                          		<div class="row">
	                          			<div class="col-md-6 col-sm-6 col-xs-12">
	                          				<ul class="list-unstyled">
	                          					<li><i class="fa fa-calendar user-profile-icon"></i> Periodo desde : {{$client->current_book()->period_from}}</li>
	                          					<li><i class="fa fa-calendar user-profile-icon"></i> Periodo Hasta : {{$client->current_book()->period_to}}</li>
	                          				</ul>
	                          			</div>
	                          			<div class="col-md-6 col-sm-6 col-xs-12">
	                          				<ul class="list-unstyled">
	                          					<li><i class="fa fa-calendar user-profile-icon"></i> Estado físico de cartilla : {{$client->current_book()->book_state_phisical}}</li>
	                          					<li><i class="fa fa-usd user-profile-icon"></i> Estado economico de cartilla : {{$client->current_book()->book_state_economic}}</li>
	                          				</ul>
	                          			</div>
	                          		</div>
	                          		<div class="row">
		                          		<table class="table table-striped">
		                          			<thead>
		                          				<tr>
		                          					<th>#</th>
		                          					<th>Día Ejercitado</th>
		                          				</tr>
		                          			</thead>
		                          			<tbody>
		                          				@foreach ($client->current_book()->daysDetail as $dDetail)
			                          				<tr>
			                          					<td>{{$dDetail->secuence}}</td>
			                          					<td>{{$dDetail->created_at}}</td>
			                          				</tr>
		                          				@endforeach
		                          			</tbody>
		                          		</table>
	                          		</div>
	                          	@endif
	                          </div>
	                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
	                          	<h2></h2>
	                          </div>
	                        </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
<style type="text/css">
	.daterangepicker{
		z-index: 10000;
	}
</style>
@endsection