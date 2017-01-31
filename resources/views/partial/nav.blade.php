@role('user')
<div class="menu_section">
	<h3>Administración</h3>
	<ul class="nav side-menu">
		<li class="@if(Request::path() == '/clients') active @endif" "><a href="{{ route('clients.index') }}"><i class="fa fa-users"></i> Clientes</span></a></li>
		<li>
			<a title="Membresias"><i class="fa fa-book"></i> Membresias</a>
			<ul class="nav child_menu">
				<li>
					<a href="{{ route('memberships.types.index') }}" title="Tipos"> Tipos</span></a>
				</li>
				<li>
					<a href="{{ route('memberships.divisions.index') }}" title="Divisiones"> Divisiones</span></a>
				</li>
			</ul>
		</li>
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
		<li>
			<a><i class="fa fa-file-text"></i> Registros</span></a>
			<ul class="nav child_menu">
				<li> <a href="{{route('registers.user-access.index')}}" title="Registro de accesos">Registro de accesos</a></li>
			</ul>
		</li>
		
	</ul>
</div>
@endrole
