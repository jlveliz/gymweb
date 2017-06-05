<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Historial de asistencia</h4>
</div>
<div class="modal-body">
	<table class="table" id="assistanceTable">
		<thead>
			<tr>
				<th>Fecha</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($assistances as $assis)
			<tr>
				<td><i class="fa fa-calendar-o"></i> {{$assis->created_at}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
</div>