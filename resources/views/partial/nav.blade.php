@role('user')
<div class="menu_section">
	<h3>Administración</h3>
	<ul class="nav side-menu">
		<li class="@if(Request::path() == '/clients') active @endif" "><a href="{{ route('clients.index') }}"><i class="fa fa-users"></i> Clientes</span></a></li>
	</ul>
</div>
@endrole
@role('administrator')
<div class="menu_section">
	<h3>Configuración</h3>
	<ul class="nav side-menu">
		<li class="@if(Request::path() == '/users') active @endif" "><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> Usuarios</span></a></li>
		<li class="@if(Request::path() == '/roles') active @endif" "><a href="{{ route('roles.index') }}"><i class="fa fa-unlock"></i> Roles</span></a></li>
		<li class="@if(Request::path() == '/permissions') active @endif" "><a href="{{ route('permissions.index') }}"><i class="fa fa-lock"></i> Permisos</span></a></li>
	</ul>
</div>
@endrole
