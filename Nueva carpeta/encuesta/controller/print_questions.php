<?php

if(isset($_POST['numPregunta'])){
	getPreguntas();
}
else{
	getConfirmacion();
}

function getConfirmacion(){
	include_once("../models/modelo.php");

	$res=getRespuesta(1);
	echo $res;
}

function getPreguntas(){

	$pregunta = $_POST["numPregunta"];
	include_once("../models/modelo.php");

	$results = getPregunta($pregunta);
	$holi = $results[0].":";
	foreach ($results[1] as $res) {
		$holi.=$res.";";
	} 
	echo ($holi);
}

?>