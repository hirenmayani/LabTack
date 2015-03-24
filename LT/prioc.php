<?php
	include 'connect.php';
	session_start();
	include 'chksession.php';
	
	if(admin_chksession())
	{
		if(isset($_REQUEST['don']))
		{
		header("location:admin_prioc.php");
			}
	$id=$_REQUEST['id'];
	$user=$_SESSION['lt_admin'];
	$prio=$_REQUEST['prio'];
	$q="UPDATE `report_tbl` SET `priority`='$prio' WHERE `id`='$id'";
	mysql_query($q,$con) or die("There is an error");
	}
	else
	{echo "<script>alert('Not logged in.. :') </script>";}
	
		header("location:admin_prioc.php");
?>
