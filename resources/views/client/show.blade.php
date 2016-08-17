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
					{{$client}}
				</div>
			</div>
		</div>
	</div>
@endsection
