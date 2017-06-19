@role('user')
<div class="menu_section">
	<h3>Administración</h3>
	<ul class="nav side-menu">
		<li class="@if(Request::path() == '/dashboard') active @endif" "><a href="{{ route('admgym.dashboard') }}"><i class="fa fa-dashboard"></i> Escritorio</span></a></li>
		<li class="@if(Request::path() == '/members') active @endif" "><a href="{{ route('members.index') }}"><i class="fa fa-address-book"></i> Miembros</span></a></li>
		<li>
			<a class="clickable" title="Membresias"><i class="fa fa-book"></i> Membresias</a>
			<ul class="nav child_menu">
				<li>
					<a href="{{ route('types.index') }}" title="Tipos"> Tipos</span></a>
				</li>
				<li>
					<a href="{{ route('divisions.index') }}" title="Divisiones"> Divisiones</span></a>
				</li>
			</ul>
		</li>
		<li>
			<a class="clickable" title="Reportes"><i class="fa fa-pie-chart"></i> Reportes</a>
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
			<a class="clickable"><i class="fa fa-file-text"></i> Registros</span></a>
			<ul class="nav child_menu">
				<li> <a href="{{route('user-access.index')}}" title="Accesos a Usuarios">Accesos a Usuarios</a></li>
				<li> <a href="{{route('member-access.index')}}" title="Acceso de Miembros">Acceso de Miembros</a></li>
			</ul>
		</li>
		
	</ul>
</div>
@endrole
