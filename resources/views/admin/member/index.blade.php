@extends('layout.admin')

@section('title','Miembros')

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 class="animated fadeIn">Miembros</h2> 
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
					    <li role="presentation" class="active"><a href="#listMember" aria-controls="listMember" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> Listado</a></li>
					    <li role="presentation"><a href="{{ route('members.create') }}"><i class="fa fa-plus"></i> Crear</a></li>
					</ul>
					<div class="tab-content tab-gym-index">
						<div role="tabpanel" class="tab-pane active" id="listMember">
							<table id="member-datatable" class="table table-striped dt-responsive nowrap table-gym animated fadeIn" cellspacing="0">
								<thead>
									<tr>
										<th class="text-center">Foto</th>
										<th class="text-center">Nombre</th>
										<th class="text-center">Cédula</th>
										<th class="text-center">Membresia</th>
										<th class="text-center">Fecha de ingreso</th>
										<th class="text-center col-md-2 col-sm-2 col-xs-6">Acción</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($members as $member)
										<tr>
											<td>
												<div class="thumb-index" style="background-image: url(@if($member->photo)'{{ asset($member->photo) }}'@else'{{ asset("public/img/default-user.png") }}'@endif);">
												</div>
											</td>
											<td><a href="{{ route('members.show',$member->id) }}" title="Ver {{$member->name .' '. $member->last_name}}"> {{$member->name .' '. $member->last_name}} </a></td>
											<td>{{$member->identity_number}}</td>
											<td> {{ $member->current_membership() ?  $member->current_membership()->type->name : '-' }} </td>
											<td class="text-center">{{$member->admission_date}}</td>
											<td class="text-center">
												<div class="btn-group">
												  <button type="button" class="btn btn-submit dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    <i class="fa fa-cog"></i> <span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu">
												    <li><a href="{{ route('members.show',$member->id) }}" title="Ver"><i class="fa fa-eye"></i> Ver</a></li>
												    <li>
														<a href="{{ route('members.edit',$member->id) }}" title="Editar"><i class="fa fa-pencil"></i> Editar</a>
													</li>
												    <li>
												    	<a href="#" title="Eliminar" data-id="{{$member->id}}" data-member="{{ $member->name }} {{ $member->last_name }}" class="delete-member"> <i class="fa fa-trash"></i> Eliminar</a>
													</li>
												  </ul>
												  </div>
												
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


	{{-- MODALS --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Atención</h4>
	      </div>
	      <div class="modal-body">
	        <p class="col-md-1 col-sm-1 col-xs-hidden ">
	        	<i class="fa fa-exclamation fa-5x text-danger" aria-hidden="true"></i>
	        </p>

	        <p class="col-md-11 col-sm-11 col-xs-12">
	        	Está seguro de eliminar al miembro <b id="member_delete"></b>
	        </p>
	        <div class="clearfix"></div>
	      </div>
	      <div class="modal-footer">
	        <form class="form-inline" action="" method="POST">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="DELETE">
	        	<button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Borrar</button>
			</form>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	{{-- MODALS --}}
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/jquery.dataTables.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/buttons.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/fixedHeader.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/responsive.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/js/datatables/scroller.bootstrap.min.css') }}" />
@endsection

@section('js')
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