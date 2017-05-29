@role('user')
<div class="menu_section">
	<h3>Administración</h3>
	<ul class="nav side-menu">
		<li class="@if(Request::path() == '/members') active @endif" "><a href="{{ route('admgym.members.index') }}"><i class="fa fa-address-book"></i> Miembros</span></a></li>
		<li>
			<a class="clickable" title="Membresias"><i class="fa fa-book"></i> Membresias</a>
			<ul class="nav child_menu">
				<li>
					<a href="{{ route('admgym.memberships.types.index') }}" title="Tipos"> Tipos</span></a>
				</li>
				<li>
					<a href="{{ route('admgym.memberships.divisions.index') }}" title="Divisiones"> Divisiones</span></a>
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
		<li class="@if(Request::path() == '/users') active @endif" "><a href="{{ route('admgym.users.index') }}"><i class="fa fa-user"></i> Usuarios</span></a></li>
		<li class="@if(Request::path() == '/roles') active @endif" "><a href="{{ route('admgym.roles.index') }}"><i class="fa fa-unlock"></i> Roles</span></a></li>
		<li class="@if(Request::path() == '/permissions') active @endif" "><a href="{{ route('admgym.permissions.index') }}"><i class="fa fa-lock"></i> Permisos</span></a></li>
		<li>
			<a class="clickable"><i class="fa fa-file-text"></i> Registros</span></a>
			<ul class="nav child_menu">
				<li> <a href="{{route('admgym.registers.user-access.index')}}" title="Registro de accesos">Registro de accesos</a></li>
			</ul>
		</li>
		
	</ul>
</div>
@endrole
