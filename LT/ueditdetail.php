<!DOCTYPE html>
<html lang="en">
<head>
<title>LabTrack - Edit Detail</title>
<script type="application/javascript">

	$("#t_info").click(function(){
		$("#info").slideToggle("slow");
		});
	$("#c_pass").click(function(){
		$("#pass").slideToggle("slow");
		});	
</script>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/form.css" type="text/css" media="screen">
<?php
	include 'connect.php';
	session_start();
	include 'chksession.php';
?>
</head>
<body id="page1">
<!-- header -->
<div class="bg">
<div class="main">
  <header>
  <?php
	include 'header.php';
?>
  <div class="row-2 slog">
    <nav>
      <ul class="menu">
      <li><a style="border:3px ridge #fff;" href="uhome.php">Submit Bug</a></li>
      <li><a href="uactivity.php">Activity<span style="color:#F00; text-shadow:none;"><?php ;?></span></a></li>
      <li><a class="active" href="ueditdetail.php">Edit Detail</a></li>
      <li class="last-item"><a href="logout.php">Logout<div style="font-size:12px; font-style:italic; color:#F00; text-shadow:none;">logged in as <?php echo $_SESSION['lt_user']?></div></a></li>      </ul>
    </nav>
  </div>
  <?php
$ret=user_chksession();
if($ret == 1){

?>
  <div class="row-3">
    <div class="content">
      <div class="form">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form_row">
            <label>Old Password:</label>
            <input type="password" required="" class="form_input" name="old_passwd"/>
          </div>
          <div class="form_row">
            <label>New Password:</label>
            <input type="password" required="" class="form_input" name="new_passwd"/>
          </div>
          <div class="form_row">
            <label>Reenter New Password:</label>
            <input type="password" required="" class="form_input" name="cnew_passwd"/>
          </div>
          <div class="form_row">
            <input type="submit" class="form_submit" value="Change password" name="sub_insert"/>
          </div>
          <input type="hidden" name="action" value="insert" />
          <div class="clear"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
  if(isset($_REQUEST['sub_insert']))
  {
 	 if($_REQUEST['new_passwd']==$_REQUEST['cnew_passwd'])
  	{
			$id=$_SESSION['lt_user'];
			$old=$_POST['old_passwd'];
			$newp=$_POST['new_passwd'];
			$re=$_POST['cnew_passwd'];

			$q="SELECT * FROM `user_tbl` WHERE `id`='$id'";
			$res = mysql_query($q,$con);
			$row = mysql_fetch_array($res);
			if($old == $row['passwd']){
				$newmd=$newp;
				$q="UPDATE `user_tbl` SET `passwd`='$newp' WHERE `id`='$id'";
				if(mysql_query($q,$con)){
					echo "<script>alert('Password updated Successfully...');window.location.assign('uhome.php');</script>";	

				}
				else{
					echo "<script>alert('Error in Updating..')</script>";	
				}
			}
			else{
					echo "<script>alert('Old Password is wrong.')</script>";	
			}
	}else
	{	
		echo "<script>alert('Password do not match');</script>";		
	  }
  }
}
?>
</header>
</body>
</html>
