<?php 
	if(!isset($_SESSION))
		session_start();
?>
<?php
	include_once("../models/modelo.php");

	$usuario=getUsuario($_SESSION['username']);
	$rep=repeticiones($usuario);
	if($rep==0){
		echo "<div class=\"not-repeated\">
						<button type=\"button\" class=\"btn btn-default\"><a href=\"./preguntas.php\">Contestar encuesta</a></button>
					</div>";
	}else{
		echo "<div class=\"not-repeated\">
						<button type=\"button\" class=\"btn btn-default\"><a href=\"./preguntas.php\">Volver a contestar encuesta</a></button>
					</div>
			<div class=\"repeated\">
						<button type=\"button\" class=\"btn btn-default\">Ver los resultados anteriores de la encuesta</button>
					</div>";
	}
?>
