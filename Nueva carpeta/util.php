<?php
	function connect($server,$user,$password,$db){
		$mysql = mysqli_connect($server,$user,$password,$db);
		//$db = mysql_select_db($databse);
		return $mysql;
	}

	function disconnect($mysql){
		mysqli_close($mysql);
	}

	function runquery($query,$mysql){
		$res=$mysql->query($query);
		if($res){
			$mensaje='El registro ha sido actualizado';
		}else{
			$mensaje='Ha ocurrido un error y el registro no ha podido actualizarse';
		}
		return $mensaje;
	}
?>
