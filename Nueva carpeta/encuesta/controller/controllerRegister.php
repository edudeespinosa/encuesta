<?php 

	include_once("../models/modelo.php");

	$user = $_POST['user'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mail = $_POST['mail'];
	$sexo = $_POST['sexo'];
	$fecha = $_POST['fecha'];

	if($user == "" || $password == "" || $repassword == "" || $mail == "" || $sexo == "" || $fecha == "")
	{
		return "favor de llenar campos";
	}	
	else
	{
		if($password != $repassword)
		{
			return "passwords doesn't match";
		}
		else
		{
			register_m($user, $password, $sexo, $fecha, $mail);
			
		}
	}
?>