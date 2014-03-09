<?php
	function connect(){
		$mysql = mysqli_connect("localhost","root","","preguntas_salud");
		$mysql->set_charset('utf8');

		return $mysql;
	}

	function disconnect($mysql){
		mysqli_close($mysql);
	}

	function runquery($query,$mysql){
		$res=$mysql->query($query);
		if($res){
			$mensaje='El registro ha sido actualizado';
			echo "1";
		}else{
			$mensaje='Ha ocurrido un error y el registro no ha podido actualizarse';
			echo "-4";
		}
		return $mensaje;
	}
?>
