<?php
function user_chksession(){
	if(isset($_SESSION['lt_user'])){
		return 1;	
	}
	else{
//		return 0;	
		header("location:index.php");
	}
}

function admin_chksession(){
	if(isset($_SESSION['lt_admin'])){
		return 1;	
	}
	else{
//		return 0;	
		header("location:index.php");
	}
}

function li_chksession(){
	if(isset($_SESSION['lt_li'])){
		return 1;	
	}
	else{
//		return 0;	
		header("location:index.php");
	}
}

?>