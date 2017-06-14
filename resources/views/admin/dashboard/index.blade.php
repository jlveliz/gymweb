@extends('layout.admin')
@section('title','Escritorio')
@section('content-page')
<div class="row tile_count">
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    <div class="tile-stats">
	      <div class="icon"><i class="fa fa-usd"></i></div>
	      <div class="count">{{$todayPayments}}</div>
	      <h3>Pagos de hoy</h3>
	      <p>Total de pagos de membresías.</p>
	    </div>
	</div>

	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-address-book"></i></div>
          <div class="count">{{$totalMembers}}</div>
          <h3>Miembros</h3>
          <p>Total de miembros del Gimnasio.</p>
        </div>
    </div>

    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-book"></i></div>
          <div class="count">{{$totalTypeMembership}}</div>
          <h3>Tipos de Membresia</h3>
          <p>Membresias a ofrecer.</p>
        </div>
    </div>

    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-calendar"></i></div>
          <div class="count">{{$totalAssistance}}</div>
          <h3>Asistencias</h3>
          <p>Miembros que acudieron hoy.</p>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Asistencias del mes corriente</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<canvas id="myChart" height="100"></canvas>
				<input type="hidden" id="dates" name="{!!$totalAssistanceCurrentMonth['dates']!!}">
				<input type="hidden" id="counters" name="{!!$totalAssistanceCurrentMonth['counters']!!}">
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('public/js/Chart.js/chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/dashboard/app.js') }}" type="text/javascript"></script>
@endsection
