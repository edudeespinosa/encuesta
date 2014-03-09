<?php

	$pregunta = $_POST["numPregunta"];
	include_once("/encuesta/models/modelo.php");
	echo $pregunta;
	$results = getPregunta($pregunta);
	$holi = $results[0].":";
	foreach ($results[1] as $res) {
		$holi.=$res.";";
	}
	$holi = var_dump($holi); 
	//echo ($holi);

?>