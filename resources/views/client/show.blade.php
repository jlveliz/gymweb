@extends('layout.master')

@section('title','Ver  Cliente /')

@section('title-page')
	<h3>Clientes <small> Los que se ejercitan con nosotros.</small></h3>
@endsection

@section('content-page')
{{$client}}
@endsection
