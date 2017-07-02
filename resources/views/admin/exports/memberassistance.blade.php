<!DOCTYPE html>
<html>
<head>
	<style type="text/css" media="print">
		table {
			width: 100%;
		}

		.table{
			border: 1px solid #000000;
			width: 100%;
		}

		.table > thead > tr > td {
			text-align: center
		}
	</style>
</head>
<body>
<table class="table">
	<tr>
		<td colspan="3"  align="center"><h1 style="text-align: center">{{config('app.name')}}</h1></td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<h3>Reporte de número de  Asistencias</h3>
		</td>
	</tr>
</table>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>Miembro</th>
			<th>Correo</th>
			<th>Total de Asistencias</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $element)
			<tr>
				<td>{{$element->name_member}}</td>
				<td>{{$element->email}}</td>
				<td>{{$element->counter}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>