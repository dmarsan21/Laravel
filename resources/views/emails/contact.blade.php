<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mnesaje recibido</title>
</head>
<body>
	<h1>Te responderemos a la brevedad posible</h1>
	<p>
		Nombre: {{ $msg->nombre }} <br />
		Email: {{ $msg->email }} <br />
		Mensaje: {{ $msg->mensaje }}
	</p>
</body>
</html>