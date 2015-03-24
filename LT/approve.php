<?php
	include 'connect.php';
	session_start();
	include 'chksession.php';
	
	if(isset($_REQUEST['both']) || isset($_REQUEST['solve']) || isset($_REQUEST['com']) || isset($_REQUEST['donothing']))
	{
	$id=$_REQUEST['id'];
	$user=$_SESSION['lt_li'];
	$comment=$user." : ".$_REQUEST['comment'];
	$status=1;
	if( isset($_REQUEST['both']) && !empty($_REQUEST['both']))
		{
		$solve=1;
		$com=1;
		}
		else if( isset($_REQUEST['solve']) && !empty($_REQUEST['solve']))
		{
		$solve=1;
		$com=0;
		}
		else if( isset($_REQUEST['com']) && !empty($_REQUEST['com']))
		{
		$solve=0;
		$com=1;
		}
		else if( isset($_REQUEST['donothing']) && !empty($_REQUEST['donothing']))
		{
		$solve=0;
		$com=0;
		}
	
	if($solve==1 && $com==0)
	{
	$q="UPDATE `report_tbl` SET `status`='1',`resolvedate`=NOW(),`solver`='$user' WHERE `id`='$id'";
	mysql_query($q,$con) or die("There is an error");
	}
	
	else if($solve==0 && $com==1)
	{
	$q="UPDATE `report_tbl` SET `li_comment`='$comment' WHERE `id`='$id'";
	mysql_query($q,$con) or die("There is an error");
	}
	
	else if($solve==1 && $com==1)
	{
	$q="UPDATE `report_tbl` SET `li_comment`='$comment',`status`='1',`resolvedate`=NOW(),`solver`='$user' WHERE `id`='$id'";
	mysql_query($q,$con) or die("There is an error");
	}
	else
	{
		echo "<script>alert('Not valid.. :') </script>";
		}
	}
	else
	{echo "<script>alert('Not clicked.. :') </script>";}
	
header("location:li_home.php");
?>
