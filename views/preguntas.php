<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/jquery.flippy.min.js"></script>
	<script type="text/javascript" src="../js/preguntas.js"></script>

</head>
<header>
	<input type="hidden" id="query">
	<div class="wrapper">
		<div class="bienvenida">
			Bienvenido
			<?php
			if($_SESSION['username'])
				echo "<div id='user'>".$_SESSION['username']."</div>";
			else { 
				header('Location: ../index.php');
			} ?>
		</div>
		<div id="goodbye"><a href="" onclick="cerrar_sesion()">Log out</a></div>
	</div>
</header>
<body>
	<div class="content">
		<h1>Pregunta <span id="tituloPregunta"></span></h1>
		<div class="wrapper">
			<div class="container" id="main">
				<div class="question" id="ques">
					<div id="pregunta">
					</div>
				</div>
				<div class="answer" id="respuesta">
					<!--ul class="list-unstyled options">
						<li class="radio"><label for="option1">Opción 1<input type="radio" name="optionsRadio" value="option1" id="option1"></label></li>
						<li class="radio"><label for="option2">Opción 2<input type="radio" name="optionsRadio" value="option2" id="option2"></label></li>
						<li class="radio"><label for="option3">Opción 3<input type="radio" name="optionsRadio" value="option3" id="option3"></label></li>
						<li class="radio"><label for="option4">Opción 4<input type="radio" name="optionsRadio" value="option4" id="option4"></label></li>
					</ul-->
				</div>
				<div class="navigation">
				</div>
			</div>
		</div>
	</div></body>
</html>
<?php

?>