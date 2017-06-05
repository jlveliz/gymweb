<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Historial de Pagos</h4>
</div>
<div class="modal-body">
	<table class="table">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Importe</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($payments as $pay)
			<tr>
				<td><i class="fa fa-calendar-o"></i> {{$pay->created_at}}</td>
				<td><i class="fa fa-money"></i> {{$pay->value}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
</div>