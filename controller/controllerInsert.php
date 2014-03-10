<?php 
	if(!isset($_SESSION))
		session_start();
?>
<?php
include_once("../models/modelo.php");

if(isset($_POST['respuestas'])){
	$pr=numeroRespuesta();
	guardarEncuesta($pr);
	//retroalimentacion(19);
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

function guardarEncuesta($pr){
	$arr=$_POST['respuestas'];
	$usuario=getUsuario($_SESSION['username']);
	//$res=array();
	$holi="";
	$repeticiones=repeticiones($usuario)+1;

	for ($i=0; $i < 8; $i++) { 
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
		guardarRespuestas($usuario,$numR,$repeticiones);
	}
	$res=retroalimentacion($usuario,$repeticiones);
	foreach ($res as $r) {
		# code...
		$holi.=$r.";";
	}
	echo $holi;
}

function retroalimentacion($usuario,$repeticiones){
	$holi="";
	$res=retro($usuario,$repeticiones);
	/*foreach ($res as $r) {
		# code...
		$holi.=$r['id_respuesta'].";";
	}*/
	//var_dump($res);	
	return $res;
}
?>