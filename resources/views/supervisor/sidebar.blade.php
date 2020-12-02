<div class="sidebar shadow">
	<div class="section-top">
		<div class="logo">
			 <img src="{{ asset('storage').'/'.Auth::user()->imagen}}" alt="" width="100">
		</div>
		<div class="user">
			<span class="subttitle">Hola:</span>
			<div class="name">
				{{ Auth::user()->name }} {{ Auth::user()->apellido }} 
				<a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir"><i class="fas fa-sign-out-alt"></i></a>
			</div>
			<div class="email">{{ Auth::user()->email }}</div>
			
		</div>

	</div>
	<div class="main">
		<ul>
			<form action="buscar" method="POST">
			@csrf
				<input type="text" name="cadena" class="form-control"  placeholder="Buscar....">
			<center><input type="submit" class="btn btn-success" value="buscar"></center>
			</form>
		</ul>
		<ul>

			<li><a href="{{ url('/tablero')}}"><i class="fas fa-table"></i>Tablero</a></i>
				
			<li><a href="{{ url('/categoria')}}"><i class="fas fa-table"></i>Categoria</a></i>
				
				
			<li><a href="{{ url('/producto')}}"><i class="fas fa-poll-h"></i>Productos Registrado</a></i>
				
				
				
			<li><a href="{{ route('user.index')}}"><i class="fas fa-users"></i>Usuarios Registrado</a></i>
				
				
			<li><a href="{{ route('role.index')}}"><i class="fas fa-database"></i>Lista de Roles</a></i>
				
			<li><a href="{{ url('/restPassword')}}"><i class="fas fa-key"></i>Restablecer contraseña</a></i>
			<li><a href="{{ url('/historia')}}"><i class="fas fa-history"></i>historial del vendedor</a></i>
			<li><a href="{{ url('/kardex')}}"><i class="fas fa-file-alt"></i>kardex de un producto</a></i>
		</ul>
	</div>
	
</div>