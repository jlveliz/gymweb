@extends('layout.admin')

@section('title','Pago de membresia /')

@section('title-page')
	<h3>Clientes <small> Los que se ejercitan con nosotros.</small></h3>
@endsection

@section('content-page')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Crear <small>Membresia</small></h2>
					<div class="clearfix"></div>
					@if($errors->has('client_id'))
						<div class="alert alert-danger" role="alert">
							{{$errors->first('client_id')}}
						</div>
					@endif
				</div>
			<div class="x_content"></div>
				<form action="{{ route('admgym.members.memberships.payments.store',[$client_id,$membership_id]) }}" id="form-create-membership" method="POST" class="form-horizontal form-label-left">
				  <input type="hidden" name="membership_id" id="membership_state_phisical" value="{{$membership_id}}">
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="row">
				    <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
				      <label class="control-label col-md-5 col-sm-5 col-xs-12">Saldo </label>
				      <div class="col-md-7 col-sm-7 col-xs-12 @if($errors->has('balance')) has-error @endif">
				        <input ype="number" step="0.01" min="0.01" class="form-control has-feedback-left" placeholder="Saldo" name="balance" id="balance" value="{!! sprintf("%01.2f", $balance); !!}" readonly="">
				         @if ($errors->has('balance')) <p class="help-block">{{ $errors->first('balance') }}</p> @endif
				         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
				      </div>
				    </div>
				    <div class="form-group col-md-4 col-sm-4 col-xs-12">
				      <label class="control-label col-md-5 col-sm-5 col-xs-12">Pago </label>
				      <div class="col-md-7 col-sm-7 col-xs-12  @if($errors->has('value')) has-error @endif">
				        <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Valor" name="value" id="value" value="">
				         @if ($errors->has('value')) <p class="help-block">{{ $errors->first('value') }}</p> @endif
				      </div>
				    </div>
				  </div>
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<div class="form-group">
                  	<div class="col-md-6 col-sm-6 col-xs-12">
                    	<a href="{{ route('admgym.members.show',$client_id) }}" class="btn btn-info"><i class="fa fa-arrow-left m-right-xs"></i> Cancelar</a>
                    	<button type="submit" class="btn btn-submit"><i class="fa fa-money"></i> Pagar</button>
                  	</div>
            	</div>
				</form>
			</div>
		</div>
	</div>

@endsection
