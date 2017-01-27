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
					<h2>Crear <small>Cartilla</small></h2>
					<div class="clearfix"></div>
					@if($errors->has('client_id'))
						<div class="alert alert-danger" role="alert">
							{{$errors->first('client_id')}}
						</div>
					@endif
				</div>
			<div class="x_content"></div>
				<form action="{{ route('clients.memberships.store',$client_id) }}" id="form-create-membership" method="POST" class="form-horizontal form-label-left">
				  <input type="hidden" name="membership_state_phisical" id="membership_state_phisical" value="1">
				  <input type="hidden" name="client_id" id="client_id" value="{{$client_id}}">
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="row">
				    <div class="form-group col-md-3 col-sm-3 col-xs-12">
				      <label class="control-label col-md-5 col-sm-5 col-xs-12">Periodo desde </label>
				      <div class="col-md-7 col-sm-7 col-xs-12 @if($errors->has('period_from')) has-error @endif">
				        <input type="text" class="form-control" placeholder="Periodo desde" name="period_from" id="period_from" value="{{ old('period_from') }}">
				         @if ($errors->has('period_from')) <p class="help-block">{{ $errors->first('period_from') }}</p> @endif
				      </div>
				    </div>
				    <div class="form-group col-md-3 col-sm-3 col-xs-12">
				      <label class="control-label col-md-5 col-sm-5 col-xs-12">Periodo hasta </label>
				      <div class="col-md-7 col-sm-7 col-xs-12  @if($errors->has('period_to')) has-error @endif">
				        <input type="text" class="form-control" placeholder="Periodo hasta" name="period_to" id="period_to" value="{{ old('period_to') }}">
				         @if ($errors->has('period_to')) <p class="help-block">{{ $errors->first('period_to') }}</p> @endif
				      </div>
				    </div>
				    <div class="form-group col-md-4 col-sm-4 col-xs-12">
				      <label class="control-label col-md-4 col-sm-4 col-xs-12">Tipo de cartilla </label>
				      <div class="col-md-7 col-sm-7 col-xs-12  @if($errors->has('membership_type_id')) has-error @endif">
				        <select name="membership_type_id" class="form-control"  id="membership_type_id">
				          		<option data-price="null" value="null">--Selecione--</option>
				        	<?php foreach ($membershipTypes as $key => $membershipType): ?>
				          		<option data-price="{{$membershipType->price}}" value="@if(old('membership_type_id') == $membershipType->id) {{ old('membership_type_id') }} @else {{$membershipType->id}} @endif">{{$membershipType->name}}</option>
				        	<?php endforeach ?>
				        </select>
				         @if ($errors->has('membership_type_id')) <p class="help-block">{{ $errors->first('membership_type_id') }}</p> @endif
				      </div>
				    </div>
				    <div class="form-group col-md-3 col-sm-3 col-xs-12">
				    	<label class="control-label col-md-5 col-sm-5 col-xs-12">Precio </label>
				      <div class="col-md-7 col-sm-7 col-xs-12">
				        <input type="text" class="form-control" placeholder="Precio" id="price" disabled value="">
				      </div>
				    </div>
				  </div>
				  <div class="row">
				  	<div class="form-group col-md-4 col-sm-4 col-xs-12">
				      <label class="control-label col-md-5 col-sm-5 col-xs-12">Pago </label>
				      <div class="col-md-7 col-sm-7 col-xs-12  @if($errors->has('membership_state_economic')) has-error @endif">
				        <select name="membership_state_economic" class="form-control"  id="membership_state_economic">
				          <!--1 = impago -->
				          <!--2 = abonado -->
				          <!--3 = pago total -->
				          <option value="@if(old('membership_state_economic') == '1') {{ old('membership_state_economic') }}@else 1 @endif">Impago</option>
				          <option value="@if(old('membership_state_economic') == '2') {{ old('membership_state_economic') }}@else 2 @endif">Abonado</option>
				          <option value="@if(old('membership_state_economic') == '3') {{ old('membership_state_economic') }}@else 3 @endif">Pago total</option>
				        </select>
				         @if ($errors->has('membership_state_economic')) <p class="help-block">{{ $errors->first('membership_state_economic') }}</p> @endif
				      </div>
				    </div>
				  	<div class="form-group col-md-4 col-sm-4 col-xs-12" id="payment" style="display:none">
				  		<label class="control-label col-md-5 col-sm-5 col-xs-12">Valor </label>
				  		<div class="col-md-7 col-sm-7 col-xs-12 @if($errors->has('value')) has-error @endif">
				  		  <input type="number" step="any" class="form-control" placeholder="Valor" name="value" id="value" value="{{ old('value') }}">
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

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
@endsection
@section('js')
<!-- daterangepicker -->
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
    $("#period_from").val(moment().format('YYYY-MM-DD'));

  	// datepicker
    $('#period_from').datetimepicker({
    	format: 'YYYY-MM-DD',
    	// minDate: moment().subtract(30,'days'),
    	maxDate: moment(),
    });
    $('#period_to').datetimepicker({
    	format: 'YYYY-MM-DD',
    	minDate: moment($('#period_from').val()).add(1,'days'),
    	// maxDate: moment().add(1,'months'),
    	disabledDates: [moment(),this.minDate]
    });

    $('#period_from').on("dp.change", function() {
       var _this = $(this);
       var date = _this.val();
       var maximumDate = moment(date).add(1,'days').format('YYYY-MM-DD')

       $('#period_to').val('');
       $('#period_to').data('DateTimePicker').minDate(maximumDate);
       $('#period_to').val(maximumDate);
    });

    // select 
    $("#membership_state_economic").on('change', function(event) {
    	var val = $(this).val();
    	var value = $("#value");
    	value.val('');
    	if (val > 1) {
    		$("#payment").css('display', 'block');
    		value.removeAttr('readonly');
    		if (val == 3) {
    			value.attr('readonly',true);
    			var price = $("#membership_type_id option:selected").data("price");
    			console.log(price)
    			value.val(price);
    		}
    	} else {
    		$("#payment").css('display', 'none');
    	}
    });


    $("#membership_type_id").on('change', function(event) {
    	var val = $(this).children("option:selected").data("price");
    	var price = $("#price");
    	if (!val) price.val(0.00);
    	price.val(val);
    });

  });
</script>
@endsection