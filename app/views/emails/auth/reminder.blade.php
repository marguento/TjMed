<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Recuperar contraseña</h2>

		<div>
			{{ $firstname }} {{ $lastname }},
			<br><br>

			Has pedido recuperar tu contraseña para ingresar a TjMed.
			<br>
			Nombre de usuario: {{ $username }}
			<br><br>

			Si tú no has pedido recuperar tu contraseña, sólo ignora este correo y tu contraseña seguirá conservando su 
			valor inicial.

			<br><br>
			Activa tu nueva contraseña dándole click al siguiente link:<br><br>
			{{ $link }}
			<br><br>

			Gracias, <br>
			TjMed
		</div>
	</body>
</html>
