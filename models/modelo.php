<?php 
	if(!isset($_SESSION))
		session_start()
?>
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
		function getRespuesta($numR){
		$mysql=connect();

		$query="SELECT texto FROM respuesta WHERE id=".$numR;
		$res=$mysql->query($query);
		$res=mysqli_fetch_array($res);
		//var_dump($res);
		disconnect($mysql);
		return $res['texto'];
	}

	function numRespuestas($pregunta){
		$mysql=connect();

		$query="SELECT count(id) FROM respuesta WHERE id_pregunta=".$pregunta;
		$res=$mysql->query($query);
		$res=mysqli_fetch_array($res);
		disconnect($mysql);
		return $res[0];
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
					session_destroy();
					//session_start();
					set_session($usuario);
					return 1;
				}
				else
				{
					return -4;
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
	function set_session($user){
		$_SESSION['username']=$user;
	}
	function get_session(){
		if (isset($_SESSION['$username']))
		{
			echo $_SESSION['$username'];
		}
		else echo "-1";
	}
		function getUsuario($nombre){
			$mysql=connect();

			$query="SELECT id FROM usuario WHERE usuario='".$nombre."'";
			$res=$mysql->query($query);
			$res=mysqli_fetch_array($res);

			disconnect($mysql);
			return $res['id'];
	}

	function guardarRespuestas($query){
		$mysql=connect();

		$res=runquery($query,$mysql);

		disconnect($mysql);
		return $res;
	}

	function retro($usuario){
		$mysql=connect();

		$query="SELECT id_respuesta FROM respuesta_us WHERE id_usuario=".$usuario;
		$res=$mysql->query($query);
		$respuestas=array();
		$retro=array();
		//$res=mysqli_fetch_array($res,MYSQLI_BOTH);

		while($row=mysqli_fetch_array($res,MYSQLI_BOTH)){
			array_push($respuestas, $row['id_respuesta']);
		}
		//var_dump($respuestas);
		foreach ($respuestas as $r) {
			# code...
			$query1="SELECT comentario FROM respuesta WHERE id=".$r;
			$res1=$mysql->query($query1);
			$res1=mysqli_fetch_array($res1);
			array_push($retro, $res1['comentario']);
		}
		disconnect($mysql);
		//var_dump($retro);
			var_dump($retro);
		return $retro;
	}
?>