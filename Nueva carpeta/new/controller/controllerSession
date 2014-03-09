<?php 
	if(!isset($_SESSION))
		session_start()
?>
<?php
	include_once("../models/modelo.php");

	function set_session($user){
		$_SESSION['username']=$user;
	}

	function get_session(){
		if (isset($_SESSION['$username']))
		{
			return $_SESSION['$username'];
		}
		else return "-1";
	}


?> 
