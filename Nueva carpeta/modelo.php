<?php
	
	include_once("util.php");
	
	function repeticiones($usuario){
		$mysql=connect();

		$query="SELECT repeticiones FROM usuario WHERE usuario='".$usuario."'";
		$res = mysql_query($query);
		$rows = mysql_fetch_array($res,MYSQL_BOTH);

		if($rows['repeticiones']>0){
			return true;
		}else{
			return false;
		}

		disconnect($mysql);
	}

	function getPregunta($numP){
		$mysql=connect();

		$queryP="SELECT texto FROM preguntas WHERE id=".$numP;
		$queryR="SELECT texto FROM respuesta WHERE id_pregunta=".$numP;
		$resP=$mysql->query($queryP);
		$resR=$mysql->query($queryR);
		$resP=mysqli_fetch_array($resP);
		$num=mysqli_num_rows($resR);
		$respuestas=array();

		while ($row=mysqli_fetch_array($resR,MYSQLI_BOTH)){
			array_push($respuestas, $row['texto']);
		}
		$res=array($resP['texto'],$respuestas);
		var_dump($res);
		disconnect($mysql);
		return $res;
	}

	function login_m($usuario, $password){
		$mysql=connect();
		$query = "SELECT user, password from USERS where user = \"".$_POST['user']."\" AND password = \"".$_POST['password']."\" ";
		
			$res =$mysql->query($query);
			$rows = mysql_fetch_array($res, MYSQL_BOTH);

			if($usuario == $rows['user'])
			{
				if($password == $rows['password'])
				{
					//MANDAR A HOME
					echo "entraste";
				}
				else
				{
					echo "error de password";
				}

			}	
			else
			{
				//LOGIN
				header('Location: index.php');
			}		

			disconnect();
	}
?>