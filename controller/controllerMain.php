<?php 
	if(!isset($_SESSION))
		session_start()
?>
<?php
	include_once("../models/modelo.php");

	if($_POST['action']==1){
		botones();
	}else if($_POST['action']==2){
		repet();
	}else if($_POST['action']==3){
		retroalimentacion();
	}

	function botones(){
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
							<button type=\"button\" class=\"btn btn-default\" onclick=\"numRep()\">Ver los resultados anteriores de la encuesta</button>
						</div>";
		}
	}
	function repet(){
		$usuario=getUsuario($_SESSION['username']);
		$rep=repeticiones($usuario);
		$holi="<ul class=\"list-unstyled\"><table class=\"table-striped\">";
		for ($i=1; $i <= $rep; $i++) { 
			# code...
			$holi.="<tr><li><a onclick=\"retro(".$i.")\">".$i."</a></li></tr>";
		}
		$holi.="</table></ul>";
		echo $holi;
	}
	function retroalimentacion(){
		$usuario=getUsuario($_SESSION['username']);
		$num=$_POST['num'];
		$retro=retro($usuario,$num);
		$holi="";
		foreach ($retro as $r) {
			# code...
			$holi.=$r.";";
		}
		echo $holi;
	}
?>
