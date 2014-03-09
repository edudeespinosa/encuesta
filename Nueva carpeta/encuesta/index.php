<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LogIn</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="Stylesheet" href="./css/style.css" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="./js/login.js"></script>

</head>
<body>
	<div id="Main">
	<div id="verificaciones">
		
	</div>
		<form id="login">
		<br>
			<p>Usuario</p>
			<input name="user" type="text" maxlength="15" id="usr"/>
			<br>
			<br>
			<p>Contraseña</p>
			<input name="password" type="password" maxlength="15" id="pswd"/>
			<br><br>
			<div id="btnLogin">
			<input type="submit" value="Log in" name="login" class="btn btn-info" onclick="checkLogin($('#login'), event)" />
			<form>
			<input type="submit" value="Register" name="register_new" class="btn btn-info" onclick="redirect(event);" />
			<br>
			</form>
			</div>
		</form>		
	</div>
</body>
</html>