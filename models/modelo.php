
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
		$respuestas=array();

		while ($row=mysqli_fetch_array($resR,MYSQLI_BOTH)){
			array_push($respuestas, $row['texto']);
		}
		$res=array($resP['texto'],$respuestas);
		//var_dump($res);
		disconnect($mysql);
		return $res;
	}

	function login_m($usuario, $password){
		$mysql=connect();
		$query = "SELECT usuario, contrsn from usuario where usuario = \"".$usuario."\" AND contrsn = \"".$password."\" ";
			$res = $mysql->query($query);
			$rows = mysqli_fetch_array($res, MYSQL_BOTH);
			$row = mysqli_num_rows($res);

			if($usuario == $rows['usuario'])
			{
				if($password == $rows['contrsn'])
				{
					//MANDAR A HOME
					session_start();
					//session_destroy();
					//session_start();

					$_SESSION['username']=$usuario;
					echo "1";
				}
				else
				{
					echo "error de password";
				}

			}	
			else
			{
				//LOGIN
				//header('Location: ../index.php');
			}

			disconnect($mysql);
	}

	function register_m($user, $password, $sexo, $fecha, $mail)
	{
		$existe = 0;
		$mysql= connect();
		$query = "SELECT usuario from usuario where usuario='".$user."'";
		$res = $mysql->query($query);
		$row = mysqli_fetch_array($res, MYSQL_BOTH);
		$row = mysqli_num_rows($res);
		if($row>0)
		{
			$existe = 1;
		}

		if($existe == 0)
		{
			//$ins = "INSERT INTO usuario (usuario,contrsn,email,sexo,fecha_nac) VALUES \"".$user."\", \"".$password."\", \"".$mail."\", \"".$sexo."\", \"".$fecha."\"";
			$ins = "INSERT INTO usuario (usuario,email,contrsn,sexo,fecha_nac) VALUES (\"".$user."\", \"".$mail."\", \"".$password."\", \"".$sexo."\", \"".$fecha."\")";
			$results = runquery($ins, $mysql);
			//login_m($user,$password);
		}
		else
		{
			echo '-1';
		}
	}


?>