	<?php
	include 'connect.php';
	session_start();
	include 'chksession.php';

	if(isset($_SESSION['lt_admin']))
		header("Location:admin_home.php");	
	if(isset($_SESSION['lt_li']))
		header("Location:li_home.php");	

$uret=user_chksession();
$lret=li_chksession();
$aret=admin_chksession();

if($uret == 0 && $lret == 0 && $aret == 0 ){
	if(isset($_REQUEST['login'])){
			$user=$_REQUEST['username'];
			$pass=$_REQUEST['password'];

	if($_REQUEST['type']==1){
			$q="SELECT * FROM `user_tbl` WHERE id='$user' AND type=1";
						$result = mysql_query($q,$con);
			if(mysql_num_rows($result) == 1){
				echo "<style>alert('successfully Logged in as normal user');</style>";
				$arr=mysql_fetch_array($result);
				
				if($pass == $arr['passwd'] && $user == $arr['id']){
					echo "You successfully Logged in.";
					$_SESSION['lt_user']=$user;
					header("Location:uhome.php");	
				}
				else{
					echo "<script>alert('Username/Password is wrong.');window.location.assign('index.php');</script>";		
				}
			}
	}
	
	else if($_REQUEST['type']==2){
		echo "<style>alert('2');</style>";
			$user=$_REQUEST['username'];
			$q="SELECT * FROM `lab_tbl` WHERE username='$user'";
			$result=mysql_query($q,$con);
			
			echo "<script>alert('$user');</script>";		
			
			if(mysql_num_rows($result) == 1){
				$arr=mysql_fetch_array($result);	
				if($pass == $arr['password'] && $user == $arr['username']){
					echo "You successfully Logged in.";	
					$labno=$arr['labno'];
					setcookie('labno',$labno,time()+360000);
					$_SESSION['lt_li']=$arr['username'];
					header("Location:li_home.php");	
				}
				else{
					echo "<script>alert('Username/Password is wrong.');window.location.assign('index.php');</script>";
				}

			}
	}
	else if($_REQUEST['type']==3){
		echo "<style>alert('3');</style>";
			$q="SELECT * FROM `admin_tbl` WHERE id='$user'";
						$result=mysql_query($q,$con);
			if(mysql_num_rows($result) == 1){
				$arr=mysql_fetch_array($result);	
				if($pass == $arr['passwd'] && $user == $arr['id']){
					echo "You successfully Logged in.";	
					$_SESSION['lt_admin']=$arr['id'];
					header("Location:admin_activity.php");	
				}
				else{
					echo "<script>alert('Username/Password is wrong.');window.location.assign('index.php');</script>";
						
				}

			}

	}
	}
	else
	{
					echo "<script>alert('not clicked.');</script>";
		}
}
else{
	header("Location:uhome.php");	
}
					echo "<script>alert('Username/Password is wrong.');window.location.assign('index.php');</script>";		

?>