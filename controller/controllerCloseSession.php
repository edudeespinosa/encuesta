<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		unser($_SESSION['username']);
	}
?>