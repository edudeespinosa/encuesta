<?php

	$pregunta = $_POST["numPregunta"];
	include_once("../models/modelo.php");

	$mysql = mysqli_connect("localhost","root","C0d1ng4fUn","preguntas_salud");
	if (mysqli_connect_errno($mysql))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/*	$results = getPregunta($pregunta);
	$holi = $results[0].":";
	foreach ($results[1] as $res) {
		$holi.=$res.";";
	} 
	echo ($holi);
*/
?>