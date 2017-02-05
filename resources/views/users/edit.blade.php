@extends('layout')

@section('contenido')

	<h1>Editar usuario</h1>

	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif

	<form method="POST" action="{{ route('usuarios.update', $user->id) }}">

		<!-- Este metodo se usa para que reconozca el metodo put para actualizar -->
		{!! method_field('PUT') !!}

		<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

		@include('users.form')

		
		<input class="btn btn-primary" type="submit" value="Enviar">
	</form>

@stop