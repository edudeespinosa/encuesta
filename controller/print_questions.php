<?php

	$pregunta = $_POST["numPregunta"];
	include_once("../models/modelo.php");

	$mysql = mysqli_connect("localhost","root","C0d1ng4fUn","preguntas_salud");
	if (mysqli_connect_errno($mysql))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  		$queryP="SELECT texto FROM preguntas WHERE id=".$pregunta;
		$queryR="SELECT texto FROM respuesta WHERE id_pregunta=".$pregunta;
		$resP=$mysql->query($queryP);
		$resR=$mysql->query($queryR);
		$resP=mysqli_fetch_array($resP);
		$respuestas=array();

		while ($row=mysqli_fetch_array($resR,MYSQLI_BOTH)){
			array_push($respuestas, $row['texto']);
		}
		$res=array($resP['texto'],$respuestas);
		//var_dump($res);
		disconnect($mysql);
		echo $res;
//$results = getPregunta($pregunta);
	$holi = $res[0].":";
	foreach ($results[1] as $res2) {
		$holi.=$res2.";";
	} 
	echo ($holi);

/*	$results = getPregunta($pregunta);
	$holi = $results[0].":";
	foreach ($results[1] as $res) {
		$holi.=$res.";";
	} 
	echo ($holi);
*/
?>