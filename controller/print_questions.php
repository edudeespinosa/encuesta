<?php

	$pregunta = $_POST["numPregunta"];
	include_once("../models/modelo.php");
	$mysql = connect();
	echo $mysql;
/*	$results = getPregunta($pregunta);
	$holi = $results[0].":";
	foreach ($results[1] as $res) {
		$holi.=$res.";";
	} 
	echo ($holi);
*/
?>