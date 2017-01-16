@extends('layout.master')

@section('title','Pago de cartilla /')

@section('title-page')
	<h3>Clientes <small> Los que se ejercitan con nosotros.</small></h3>
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Crear <small>Cartilla</small></h2>
					<div class="clearfix"></div>
					@if($errors->has('client_id'))
						<div class="alert alert-danger" role="alert">
							{{$errors->first('client_id')}}
						</div>
					@endif
				</div>
			<div class="x_content"></div>
				<form action="{{ route('clients.books.payments.store',[$client_id,$book_id]) }}" id="form-create-book" method="POST" class="form-horizontal form-label-left">
				  <input type="hidden" name="book_id" id="book_state_phisical" value="{{$book_id}}">
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="row">
				    <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
				      <label class="control-label col-md-5 col-sm-5 col-xs-12">Saldo </label>
				      <div class="col-md-7 col-sm-7 col-xs-12 @if($errors->has('balance')) has-error @endif">
				        <input type="text" class="form-control has-feedback-left" placeholder="Saldo" name="balance" id="balance" value="{!! sprintf("%01.2f", $balance); !!}" readonly="">
				         @if ($errors->has('balance')) <p class="help-block">{{ $errors->first('balance') }}</p> @endif
				         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
				      </div>
				    </div>
				    <div class="form-group col-md-4 col-sm-4 col-xs-12">
				      <label class="control-label col-md-5 col-sm-5 col-xs-12">Pago </label>
				      <div class="col-md-7 col-sm-7 col-xs-12  @if($errors->has('value')) has-error @endif">
				        <input type="text" class="form-control" placeholder="Valor" name="value" id="value" value="{{ old('value') }}">
				         @if ($errors->has('value')) <p class="help-block">{{ $errors->first('value') }}</p> @endif
				      </div>
				    </div>
				  </div>
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<div class="form-group">
                  	<div class="col-md-6 col-sm-6 col-xs-12">
                    	<a href="{{ route('clients.show',$client_id) }}" class="btn btn-primary">Cancelar</a>
                    	<button type="submit" class="btn btn-success">Guardar</button>
                  	</div>
            	</div>
				</form>
			</div>
		</div>
	</div>

@endsection