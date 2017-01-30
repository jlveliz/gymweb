@extends('layout.master')

@section('title','Creación de Clientes /')

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
				<form action="{{ route('clients.memberships.store',$client_id) }}" id="form-create-membership" method="POST">
				  <input type="hidden" name="membership_state_phisical" id="membership_state_phisical" value="1">
				  <input type="hidden" name="client_id" id="client_id" value="{{$client_id}}">
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">

				    <div class="form-group col-md-4 col-sm-4 col-xs-6 @if($errors->has('membership_type_id')) has-error @endif">
				      <label class="control-label">Tipo de membresia </label>
				        <select name="membership_type_id" class="form-control"  id="membership_type_id">
				          		<option value="null">--Selecione--</option>
				        	<?php foreach ($membershipTypes as $key => $membershipType): ?>
				          		<option data-price="{{$membershipType->price}}" data-division="{{$membershipType->division->name}}" data-length-time="{{$membershipType->length_time_number}} " data-length-mod="{{$membershipType->length_time_mod}}"  value="{{$membershipType->id}}" @if(old('membership_type_id') == $membershipType->id) selected  @endif>{{$membershipType->name}}</option>
				        	<?php endforeach ?>
				        </select>
				         @if ($errors->has('membership_type_id')) <p class="help-block">{{ $errors->first('membership_type_id') }}</p> @endif
				    </div>

				     <div class="form-group col-md-4 col-sm-4 col-xs-6">
				      <label class="control-label">División </label>
				       <input type="text" placeholder="División" id="division" name="division" value="{{old('division')}}" class="form-control" readonly>
				    </div>

				    <div class="form-group col-md-3 col-sm-3 col-xs-3 @if($errors->has('price')) has-error @endif">
				    	<label for="price">Precio de la Membresia </label>
				    	<div class="form-group col-md-9 col-xs-12" style="padding-left:0px">
				        	<input type="number" step="0.01" min="0.01" class="form-control" placeholder="Precio" name="price" id="price" value="{{old('price')}}">
				        	@if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
				    	</div>
				    </div>
				   
				    <div class="form-group col-md-2 col-sm-2 col-xs-4 @if($errors->has('period_from')) has-error @endif">
				      <label for="period_from">Periodo desde </label>
				       <input type="text" class="form-control" placeholder="Periodo desde" name="period_from" id="period_from" value="{{ old('period_from') }}">
				         @if ($errors->has('period_from')) <p class="help-block">{{ $errors->first('period_from') }}</p> @endif
				   </div>

				    <div class="form-group col-md-2 col-sm-2 col-xs-6 @if($errors->has('period_to')) has-error @endif">
				      <label for="period_to">Periodo hasta </label>
				        <input type="text" class="form-control" placeholder="Periodo hasta" name="period_to" id="period_to" readonly value="{{ old('period_to') }}">
				         @if ($errors->has('period_to')) <p class="help-block">{{ $errors->first('period_to') }}</p> @endif
				    </div>			 

				   	<div class="form-group col-md-2 col-sm-2 col-xs-12 @if($errors->has('membership_state_economic')) has-error @endif">
				      <label for="pago">Pago </label>
				      
				        <select class="form-control" name="membership_state_economic" class="form-control"  id="membership_state_economic" @if(!old('membership_state_economic')) disabled @endif>
				        	<option  value="null">--Selecione--</option>
				          <!--1 = impago -->
				          <!--2 = abonado -->
				          <!--3 = pago total -->
				          <option value="1" @if(old('membership_state_economic') == '1') selected @endif >Impago</option>
				          <option value="2" @if(old('membership_state_economic') == '2') selected @endif >Abonado</option>
				          <option value="3" @if(old('membership_state_economic') == '3') selected @endif>Pago total</option>
				        </select>
				         @if ($errors->has('membership_state_economic')) <p class="help-block">{{ $errors->first('membership_state_economic') }}</p> @endif
				    </div>
				  	

				  	<div class="form-group col-md-2 col-sm-2 col-xs-12 @if($errors->has('payment_value')) has-error @endif"" id="payment">
				  		<label for="payment_value">Valor a pagar </label>
				  		  <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Valor" name="payment_value" id="payment_value" value="{{ old('payment_value') }}" @if(!old('payment_value')) readonly @endif >
				  		   @if ($errors->has('payment_value')) <p class="help-block">{{ $errors->first('payment_value') }}</p> @endif
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

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
@endsection
@section('js')
<!-- daterangepicker -->
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {


    $("#membership_type_id").on('change', function(event) {
    	var price = $(this).children('option:selected').data('price') ? $(this).children('option:selected').data('price') : null;
    	var division = $(this).children('option:selected').data('division') ? $(this).children('option:selected').data('division') : null;

    	var legthTime = $(this).children('option:selected').data('length-time') ? $(this).children('option:selected').data('length-time') : null;


    	var legthMod = $(this).children('option:selected').data('length-mod') ? $(this).children('option:selected').data('length-mod') : null;
    	
    	if (!price || !division || !legthTime || !legthMod) {
    		$("#division").val('');
    		$("#price").attr('readonly', true);
    		$("#price").val('');
    		$("#period_from").attr('readonly', true);
    		$("#period_to").val('');
    	} else {
    		$("#division").val(division);
    		$("#price").removeAttr('readonly');
    		$("#price").val(price);
    		$("#period_from").removeAttr('readonly');
    		$("#period_to").val(moment($("#period_from").val()).subtract(1,'days').add(legthTime,legthMod).format('YYYY-MM-DD'));
    	}

    	$("#membership_state_economic").val('null');
    	$("#payment_value").val('null');
    	// $("#payment").style('display','none');
    });
    
    $("#period_from").val(moment().format('YYYY-MM-DD'));



  	// datepicker
    $('#period_from').datetimepicker({
    	format: 'YYYY-MM-DD',
    });


    $('#period_from').on("dp.change", function() {
        var legthTime = $("#membership_type_id").children('option:selected').data('length-time') ? $("#membership_type_id").children('option:selected').data('length-time') : null;
    	var legthMod = $("#membership_type_id").children('option:selected').data('length-mod') ? $("#membership_type_id").children('option:selected').data('length-mod') : null;
    	$("#period_to").val(moment($("#period_from").val()).subtract(1,'days').add(legthTime,legthMod).format('YYYY-MM-DD'));
    });


    // select 
    $("#membership_state_economic").on('change', function(event) {
    	var val = $(this).val();
    	var paymentValue = $("#payment_value");
    	paymentValue.val('');
    	if (val > 1) {
    		$("#payment").css('display', 'block');
    		paymentValue.removeAttr('readonly');
    		if (val == 3) {
    			paymentValue.attr('readonly',true);
    			var price = $("#price").val();
    			paymentValue.val(price);
    		}
    	} else {
    		paymentValue.attr('readonly',true);
    	}
    });




    $("#membership_type_id").on('change', function(event) {
    	var _this = $(this);
    	if (_this.val() == 'null') {
    		$("#membership_state_economic").attr('disabled',true);
    		$("#membership_state_economic").val('null');
    		$("#payment").css('display', 'none');
    	} else {
    		$("#membership_state_economic").removeAttr('disabled');
    	}
    });


    $("#price").on('change', function(event) {
    	var val = $(this).val();
    	var paymentVal = $("#payment_value");
    	if (!val) basePrice.val(0.00);
    	if ($("#membership_state_economic").children('option:selected').val() == 3) {
    		paymentVal.val(val);
    	}
    });

  });
</script>
@endsection