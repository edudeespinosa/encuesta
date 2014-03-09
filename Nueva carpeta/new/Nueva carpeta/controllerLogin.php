<?php 

	include_once("modelo.php");

	if(isset($_POST['register']))
	{
		register();
	}
	if(isset($_POST['login']))
	{
		login();
	}

	function login()
	{

		if(($_POST['user'] != "") && ($_POST['password'] != "" ))
		{ 
			$usuario = $_POST['user'];
			$password = $_POST['password'];
			login_m($usuario,$password);
		}
	}

	function register()
	{
		$user = $_POST['user'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$mail = $_POST['mail'];
		$sexo = $_POST['sexo'];
		$fecha = $_POST['fecha'];
			if($user == "" || $password == "" || $repassword == "" || $mail == "" || $sexo == "" || $fecha == "")
			{
				echo "favor de llenar campos";
			}	
			else
			{
				if($password != $repassword)
				{
					echo "passwords doesn't match";
				}
				else
				{
					register_m($user, $password, $sexo, $fecha, $mail);
				}
			}
	}

?>