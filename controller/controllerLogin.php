<?php 

	include_once("../models/modelo.php");

	if(isset($_POST['register']))
	{
		register();
	}
	if(isset($_POST['register_new']))
	{
		register_new();
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
	function register_new()
	{
		header('Location: ../views/register.php');

	}
	function register()
	{
		$user = $_POST['user'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$mail = $_POST['mail'];
		//$sexo = $_POST['sexo'];
		$fecha = $_POST['fecha'];
			if($user == "" || $password == "" || $repassword == "" || $mail == "" || $sexo == "" || $fecha == "")
			{
				echo "-3";
			}	
			else
			{
				if($password != $repassword)
				{
					echo "-2";
				}
				else
				{
					register_m($user, $password, $sexo, $fecha, $mail);
				}
			}
	}

?>