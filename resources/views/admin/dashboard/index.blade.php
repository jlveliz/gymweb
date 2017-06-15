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
	<div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Asistencias del mes corriente</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<canvas id="myChart" height="100"></canvas>
				<input type="hidden" id="dates" value="{!!$totalAssistanceCurrentMonth['dates']!!}">
				<input type="hidden" id="counters" value="{!!$totalAssistanceCurrentMonth['counters']!!}">
			</div>
		</div>
	</div>

	<div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
		<div class="x_panel">
			<div class="panel panel-default">
			  <div class="panel-heading"><h2>Miembros Recientes</h2></div>
			  <div class="panel-body">
			    <table class="table table-striped">
			    	@if (count($recentMembers) > 0)
			    		@foreach ($recentMembers as $member)
			    		<tr>
			    			<td style="vertical-align: middle;">
			    				<div class="thumb-index" style="background-image: url(@if($member->photo)'{{ asset($member->photo) }}'@else'{{ asset("public/img/default-user.png") }}'@endif);">
								</div>
			    			</td>
			    			<td style="vertical-align: middle;">{{$member->name}} {{$member->last_name}}</td>
			    		</tr>
			    		@endforeach
			    	@else
			    		<tr>
			    			<td colspan="2"><p class="text-muted text-center">No existen nuevos miembros a mostrar.</p></td>
			    		</tr>
			    	@endif
			    </table>
			  </div>
			</div>
		</div>
	</div>

</div>
@endsection

@section('js')
<script src="{{ asset('public/js/Chart.js/chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/dashboard/app.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var ctx = $("#myChart");
	    var labelsChart = '{!!$totalAssistanceCurrentMonth['dates']!!}';
	    var dataChart = '{!!$totalAssistanceCurrentMonth['counters']!!}';
	    
	    labelsChart = labelsChart.split(',');
	    dataChart = dataChart.split(',');

	    var myChart = new Chart(ctx, {
	        type: 'line',
	        data: {
	            labels: labelsChart ? labelsChart : [''],
	            datasets: [{
	                label: '# Asistencias del mes de ' + moment().format('MMMM'),
	                data: dataChart ? dataChart : [''],
	                backgroundColor: [
	                    'rgba(231, 43, 43, 0.5)',
	                    'rgba(231, 43, 43, 0.5)',
	                    'rgba(231, 43, 43, 0.5)',
	                    'rgba(231, 43, 43, 0.5)',
	                    'rgba(231, 43, 43, 0.5)',
	                    'rgba(231, 43, 43, 0.5)'
	                ],
	                borderColor: [
	                    'rgba(231, 43, 43, 0.2)',
	                    'rgba(231, 43, 43, 0.2)',
	                    'rgba(231, 43, 43, 0.2)',
	                    'rgba(231, 43, 43, 0.2)',
	                    'rgba(231, 43, 43, 0.2)',
	                    'rgba(231, 43, 43, 0.2)'
	                ],
	                borderWidth: 1
	            }]
	        },
	        options: {
	            scales: {
	                yAxes: [{
	                    ticks: {
	                        beginAtZero: true,
	                    }
	                }],
	                 xAxes: [{
        				type: 'time',
        				time: {
          					displayFormats: {
					            'day': 'MMM DD',
					       	}
					    }
					}]
	            }
	        }
	    });
	});
</script>
@endsection
