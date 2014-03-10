<?php session_start()?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Principal</title>
	    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/jquery.flippy.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<link rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="../js/main.js"></script>	
	</head>
	<header>
		<div class="wrapper">
			<div class="bienvenida">
				Bienvenido
				<?php
				if($_SESSION['username'])
					echo "<div id='user'>".$_SESSION['username']."</div>";
				else {
					header('Location: ../index.php');
				} 
				?>
				
			</div>
			<div id="goodbye"><a href="" onclick="cerrar_sesion(event);">Log out</a></div>
		</div>
	</header>
	<body>
		<div class="content">
			<div class="wrapper">
				<div class="container" id="main">
					<!--<div class="not-repeated">
						<button type="button" class="btn btn-default"><a href="./preguntas.php">Contestar encuesta</a></button>
					</div>
					<div class="repeated">
						<button type="button" class="btn btn-default">Ver los resultados anteriores de la encuesta</button>
					</div>-->
				</div>
			</div>
		</div>
	</body>
</html>