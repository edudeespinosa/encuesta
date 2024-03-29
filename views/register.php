<?php 
	if(!isset($_SESSION))
		session_start();
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="Stylesheet" href="../css/style.css" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/register.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>

</head>
<style>
	.wrapper{
		padding-top: 8%;
	}
	.alerts{
		width: 100%;
	}
</style>
<body>
<div class="wrapper">
	<div id="registro">
		<!--div id="verificaciones"></div-->
		<form id="forma_registro">
			<h1>¡Registra una nueva cuenta!</h1>
			<div class="form-group">	
			<label class="left">Usuario</label>
			<input class="right" name="user" id="user" type="text" maxlength="15" />
			</div>
			<div class="form-group">
			<label class="left">Password</label>
			<input class="right" name="password" id="password" type="password" maxlength="15" />
			</div>
			<div class="form-group">
			<label class="left">Reingresa Password</label>
			<input class="right" name="repassword" id="repassword" type="password" maxlength="15" />
			</div>
			<div class="form-group">
			<label class="left">E-mail</label>
			<input class="right" name="mail" id="mail" type="text" />
			</div>
			<div class="form-group">
			<label>Sexo</label>
			<div class="form-group">
				<li class="radio sexo"><label for="sexo1">Masculino<input type="radio" name="sexo" value="M" id="sexo1"></label></li>
				<li class="radio sexo"><label for="sexo2">Femenino<input type="radio" name="sexo" value="F" id="sexo2"></label></li>
			</div>		</div>
			<div class="form-group">
			<label class="left hasDatepicker">Fecha de Nacimiento</label>
			<input class="right" name="fecha" id="fecha" type="text" maxlength="15" />
			</div>
			<input type="submit" value="Registrarse" name="register" class="btn btn-info" onclick="checkForm($('#forma_registro'))" />
			<div class="alerts" style="display: none; width:100%;"></div>
		</form>	
	</div>
</div>
</body>
</html>