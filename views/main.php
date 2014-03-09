<?php session_start()?>
<?php 
	include("../models/modelo.php");
	if(get_session()!=-1)
	{
		echo get_session();
	}
	else{
		echo 'fail';
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<header>
	<div class="wrapper">
		<div class="bienvenida">
			Bienvenido
			<?php
			if($_SESSION['username'])
				echo "<div id='user'>".$_SESSION['username']."</div>";
			else { 
			} 
			?>
			
		</div>
		<div id="goodbye"><a href="<?php unset( $_SESSION['username'] )?>">Log out</a></div>
	</div>
</header>
<body>
	<div class="content">
		<div class="wrapper">
			<div class="container" id="main">
				<div class="not-repeated">
					<button type="button" class="btn btn-default"><a href="./preguntas.php">Contestar encuesta</a></button>
				</div>
				<div class="repeated">
					<button type="button" class="btn btn-default">Ver los resultados anteriores de la encuesta</button>
				</div>
			</div>
		</div>
	</div></body>
</html>