{!! csrf_field() !!}


	@if ($showFields)

		<p><label for="nombre">
			Nombre
			<input class="form-control" type="text" name="nombre" value="{{ $message->nombre or old('nombre') }}">
			{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
		</label></p>

		<p><label for="email">
			Email
			<input class="form-control" type="email" name="email" value="{{ $message->email or old('email') }}">
			{!! $errors->first('email', '<span class="error">:message</span>') !!}
		</label></p>

	@endif

	<p><label for="mensaje">
		Mensaje
		<textarea class="form-control" name="mensaje">{{ $message->mensaje or old('nombre') }}</textarea>
		{!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
	</label></p>

	<input class="btn btn-primary" type="submit" value="{{ $btnText or 'Guardar' }}">