<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="/css/app.css">

	<title>David Martinez</title>
</head>
<body>
	<header>

		<?php 

			function activeMenu($url){
				return request()->is($url) ? 'active' : '';
			}
		?>

		<!-- <h1>{{ request()->is('/') ? 'Estas en el home' : 'No estás en el home' }}</h1> -->

		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">David Martinez</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">

						<li class="{{ activeMenu('/') }}">
							<a href="{{ route('home') }}">Inicio</a>
						</li>
						<li class="{{ activeMenu('saludos*') }}" >
							<a href="{{ route('saludos', 'Chikita') }}">Saludo</a>
						</li>
						<li class="{{ activeMenu('mensajes/create') }}">
							<a href="{{ route('mensajes.create') }}">Contactos</a>
						</li>
						
						@if (auth()->check())
							<li class="{{ activeMenu('mensajes*') }}">
								<a href="{{ route('mensajes.index') }}">Mensajes</a>
							</li>
							@if (auth()->user()->hasRoles(['admin']))
								<li class="{{ activeMenu('usuarios*') }}">
									<a href="{{ route('usuarios.index') }}">Usuarios</a>
								</li>
							@endif
						@endif

					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						@if (auth()->guest())
							<li class="{{ activeMenu('login') }}">
								<a href="/login">Login</a>
							</li>
						@else

							

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }} <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a></li>
									<li><a href="/logout">Cerrar sesión</a></li>
								</ul>
							</li>

						@endif
						
						
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

				
	</header>

	<div class="container">
		@yield('contenido')

		<footer>Copyright {{ date('Y') }}</footer>
	</div>

<script src="/js/all.js"></script>
</body>
</html>