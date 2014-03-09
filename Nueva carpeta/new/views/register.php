<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="Stylesheet" href="../css/style.css" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/register.js"></script>

</head>
<body>
<div id="registro">
	<div id="verificaciones">
	</div>
	<form id="forma_registro" >
		<br>
		<p>	
		<label>Usuario</label>
		<input name="user" id="user" type="text" maxlength="15" />
		</p>
		<p>
		<label>Password</label>
		<input name="password" id="password" type="password" maxlength="15" />
		</p>
		<p>
		<label>Reingresa Password</label>
		<input name="repassword" id="repassword" type="password" maxlength="15" />
		</p>
		<p>
		<label>E-mail</label>
		<input name="mail" id="mail" type="text" />
		</p>
		<p>
		<label>Sexo</label>
		<li class="radio sexo"><label for="sexo1">Masculino<input type="radio" name="sexo" value="M" id="sexo1"></label></li>
		<li class="radio sexo"><label for="sexo2">Femenino<input type="radio" name="sexo" value="F" id="sexo2"></label></li>
		</p>
		<p>
		<label>Fecha de Nacimiento</label>
		<input name="fecha" id="fecha" type="text" maxlength="15" />
		</p>
		<input type="submit" value="Registrarse" name="register" class="btn btn-info" onclick="checkForm($('#forma_registro'))" />
	</form>	
</div>
</body>
</html>