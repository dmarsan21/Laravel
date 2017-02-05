@extends('layout')

@section('contenido')

<h1>Contactos</h1>

<h2>Escribeme</h2>

@if( session()->has('info') )

	<h3>{{  session('info') }}</h3>

@else

<form method="POST" action="{{ route('mensajes.store') }}">

	<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
	@include('messages.form', [
		'message' => new App\Message,
		'showFields' => auth()->guest()
	])
</form>

<hr />

@endif

@stop