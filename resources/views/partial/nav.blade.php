@role('user')
<div class="menu_section">
	<h3>Administración</h3>
	<ul class="nav side-menu">
		<li class="@if(Request::path() == '/clients') active @endif" "><a href="{{ route('clients.index') }}"><i class="fa fa-user-group"></i> Clientes</span></a></li>
	</ul>
</div>
@endrole
@role('administrator')
<div class="menu_section">
	<h3>Configuración</h3>
	<ul class="nav side-menu">
		<li class="@if(Request::path() == '/users') active @endif" "><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> Usuarios</span></a></li>
	</ul>
</div>
@endrole