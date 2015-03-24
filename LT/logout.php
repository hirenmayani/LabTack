<?php
	session_start();
	
	if(isset($_SESSION['lt_admin']) || isset($_SESSION['lt_li'])|| isset($_SESSION['lt_user']))
	
{
	if(isset($_SESSION['lt_admin'])){
		unset($_SESSION['lt_admin']);
		session_unset();
		header("Location:index.php");
	}
	if(isset($_SESSION['lt_li'])){
		unset($_SESSION['lt_li']);
		session_unset();
		header("Location:index.php");
	}
	if(isset($_SESSION['lt_user'])){
		unset($_SESSION['lt_user']);
		session_unset();
		header("Location:index.php");
	}

}
	else{
		header("Location:index.php");
	}


?>