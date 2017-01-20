@extends('layout.master')

@section('title','Listado de Tipo de Cartilla /')

@section('title-page')
	<h3>Tipo de Cartilla <small> Contiene la descripción y detalle de una cartilla.</small></h3>
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listado <small>Tipo de Cartilla</small></h2>
					<ul class="nav navbar-right panel_toolbox">
	                    <li><a href="{{ route('book-types.create') }}"><i class="fa fa-plus"></i> Crear</a>
	                    </li>
	                  </ul>
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
					<table id="book-type-datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center">Nombre</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Precio</th>
								<th class="text-center">Fecha de creación</th>
								<th class="text-center col-md-2 col-sm-2 col-xs-6">Acción</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($bookTypes as $bookType)
								<tr>
									<td>{{$bookType->name}} </td>
									<td>{{$bookType->description}}</td>
									<td>$ {{$bookType->price}}</td>
									<td>{{$bookType->created_at}}</td>
									<td>
										<ul class="nav navbar-right panel_toolbox">	
											<li>
												<a href="{{ route('book-types.edit',$bookType->id) }}" title="Editar"><i class="fa fa-pencil"></i> Editar</a>
											</li>
											<li>
												<form action="{{ route('book-types.destroy',$bookType->id) }}" method="POST">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="_method" value="DELETE">
													<button type="submit" title="Eliminar" class="btn btn-link" ><i class="fa fa-trash"></i> Eliminar</button>
												</form>
											</li>
										</ul>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/jquery.dataTables.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/buttons.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/fixedHeader.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/responsive.bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/scroller.bootstrap.min.css') }}" />
@endsection

@section('js')
 <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('js/datatables/dataTables.bootstrap.js') }}"></script>
 <script src="{{ asset('js/datatables/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('js/datatables/buttons.bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/datatables/jszip.min.js') }}"></script>
 <script src="{{ asset('js/datatables/pdfmake.min.js') }}"></script>
 <script src="{{ asset('js/datatables/vfs_fonts.js') }}"></script>
 <script src="{{ asset('js/datatables/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('js/datatables/buttons.print.min.js') }}"></script>
 <script src="{{ asset('js/datatables/dataTables.fixedHeader.min.js') }}"></script>
 <script src="{{ asset('js/datatables/dataTables.keyTable.min.js') }}"></script>
 <script src="{{ asset('js/datatables/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('js/datatables/responsive.bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/datatables/dataTables.scroller.min.js') }}"></script>

 <script type="text/javascript">
 	$(document).ready(function(){
    	$('#book-type-datatable').DataTable();
	});
 </script>
@endsection