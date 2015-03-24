<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin panel - Add Lab</title>
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
      <li><a href="admin_activity.php">Details<span style="color:#F00; text-shadow:none;"></span></a></li>
      <li><a class="active" style="border:3px ridge #fff;" href="admin_addlab.php">Add Lab</a></li>
      <li><a href="admin_prioc.php">Change Priority</a></li>
      <li><a href="admin_editdetail.php">Edit Detail</a></li>
      <li class="last-item"><a href="logout.php">Logout<div style="font-size:12px; font-style:italic; color:#F00; text-shadow:none;">logged in as <?php echo $_SESSION['lt_admin']?></div></a></li>
      </ul>
    </nav>
  </div>
  <div class="row-3">
    <div class="content">
      <?php

$ret=admin_chksession();
if($ret == 1){
?>
      <div class="form">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form_row">
            <label>Lab No.:</label>
            <input type="text" required="" class="form_input" name="labno" required=""/>
          </div>
          <div class="form_row">
            <label>Username:</label>
            <input type="text" required="" class="form_input" name="uname" required=""/>
          </div>
          <div class="form_row">
            <label>Password:</label>
            <input type="password" required="" class="form_input" name="password" required=""/>
          </div>
          <div class="form_row">
            <label>Confirm Password:</label>
            <input type="Password" required="" class="form_input" name="cpassword" required=""/>
          </div>
          <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" name="sub_insert"/>
          </div>
          <input type="hidden" name="action" value="insert" />
          <div class="clear"></div>
        </form>
      </div>
      <?php
		if(isset($_POST['sub_insert']) && !empty($_POST['sub_insert']))
		{
			if($_POST['action'] == "insert")
			{
				$labno=$_POST['labno'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				$username=$_POST['uname'];
				$user=$_SESSION['lt_admin'];
				if($password==$cpassword)
				{
$q="INSERT INTO `lab_tbl`(`labno`, `username`, `password`, `extra`) VALUES ($labno,'$username','$password','none')";
				mysql_query($q,$con) or die("There is an error in lab_tbl");
$q1="INSERT INTO `user_tbl`(`id`, `passwd`, `Type`)  VALUES ('$username','$password',2)";
				mysql_query($q1,$con) or die("There is an error in adding user_tbl");
				echo "<script>alert('Lab Successfully added...');</script>";
				}else
				echo "<script>alert('Password didn't match !!!');</script>";
			}
		}
		}
		?>
    </div>
  </div>
</div>
</header>
</body>
</html>