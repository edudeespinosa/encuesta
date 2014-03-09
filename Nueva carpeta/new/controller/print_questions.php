<?php 
	if(!isset($_SESSION))
		session_start()
?>
<?php
	include_once("../models/modelo.php");

if(isset($_POST['numPregunta'])){
	getPreguntas();
}
else {
	$pr=numeroRespuesta();
	getConfirmacion($pr);
}

function numeroRespuesta(){
	
	$pr=array();
	$holi="";
	for($i=1;$i<=8;$i++){
		$n=numRespuestas($i);
		array_push($pr, $n);
	}
	return $pr;
}

function getConfirmacion($pr){
	$arr=$_POST['respuestas'];
	$respuesta=array();
	$holi="";
	for ($i=0; $i < 8; $i++) { 
		$pregunta=getPregunta($i+1);
		# code...
		if($i==0){
			$numR=$arr[$i]+1;
		}else{
			$numR=$arr[$i]+1;
			if($i==7){
				$numR+=$pr[$i];
			}
			for($j=$i-1;$j>=0;$j--){
				$numR+=$pr[$j];
			}
		}
		array_push($respuesta, $pregunta[0]);
		array_push($respuesta, getRespuesta($numR));
	}
	foreach ($respuesta as $r) {
		$holi.=$r.";";
	}
	echo $holi;
}

function getPreguntas(){

	$pregunta = $_POST["numPregunta"];

	$results = getPregunta($pregunta);
	$holi = $results[0].":";
	foreach ($results[1] as $res) {
		$holi.=$res.";";
	} 
	echo ($holi);
}

?>