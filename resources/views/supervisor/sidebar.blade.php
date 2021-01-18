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
			@can('haveaccess','tablero.view')
			<li><a href="{{ url('/tablero')}}"><i class="fas fa-table"></i>Tablero</a></i>
			@endcan

			<li><a href="{{ url('/') }}"><i class="fas fa-th-list"></i>Lista de Categoria</a></li>
			<li><a href="{{ url('/listaProdu') }}"><i class="fas fa-th-list"></i>Lista de Productos</a></li>
			
				@can('haveaccess','categoria.index')
			<li><a href="{{ url('/categoria')}}"><i class="fas fa-table"></i>Agregar Categoria</a></i>
				@endcan
				@can('haveaccess','producto.index')
			<li><a href="{{ url('/producto')}}"><i class="fas fa-poll-h"></i>Productos Registrado</a></i>
				@endcan
					@can('haveaccess','revisar.index')
			<li><a href="{{ url('/Revisiones') }}"><i class="fas fa-poll-h"></i>Productos por Revisar</a></li>
			@endcan

			@can('haveaccess','aceptados.index')
				<li><a href="{{ url('/aceptados') }}"><i class="fas fa-poll-h"></i>Productos por Concesionar</a></li>
				@endcan

				@can('haveaccess','comentario.index')
			<li><a href="{{ url('/comentario') }}"><i class="fas fa-users"></i>Moderaciones</a></li>
				@endcan

				@can('haveaccess','pregunta.create')
			<li><a href="{{ url('/pregunta') }}"><i class="fas fa-users"></i>Preguntas Realizadas</a></li>
				@endcan



				@can('haveaccess','user.index')
			<li><a href="{{ route('user.index')}}"><i class="fas fa-users"></i>Usuarios Registrado</a></i>
				@endcan
			 @can('haveaccess','roles.view')
			<li><a href="{{ route('role.index')}}"><i class="fas fa-database"></i>Lista de Roles</a></i>
				@endcan
			 @can('haveaccess','historial.view')
			<li><a href="{{ url('/usuarios')}}"><i class="fas fa-history"></i>historial del vendedor</a></i>
				@endcan

			<li><a href="{{ url('/Productos')}}"><i class="fas fa-file-alt"></i>kardex de un producto</a></i>
		</ul>
	</div>
	
</div>