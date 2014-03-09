<?php session_start()?>
<?php
	include_once("../models/modelo.php");
	$user = $_POST['user'];
	$password = $_POST['password'];

	if($user == "")
	{
		echo "-1";
	}	else if($password =="")
	{
		echo "-2";
	}
	else if(login_m($user, $password)==1)
	{
		set_session($user);
		echo "1";
	}
?>