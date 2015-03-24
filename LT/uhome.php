<!DOCTYPE html>
<html lang="en">
<head>
<title>LabTrack</title>
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
      <li><a class="active" style="border:3px ridge #fff;" href="uhome.php">Submit Bug</a></li>
      <li><a href="uactivity.php">Activity<span style="color:#F00; text-shadow:none;"><?php echo "";?></span></a></li>
      <li><a href="ueditdetail.php">Edit Detail</a></li>
      <li class="last-item"><a href="logout.php">Logout<div style="font-size:12px; font-style:italic; color:#F00; text-shadow:none;">logged in as <?php echo $_SESSION['lt_user']?></div></a></li>
    </ul>
  </nav>
</div>
<div class="row-3">
<div class="content">
<?php

$ret=user_chksession();
if($ret == 1){
?>
      <div class="form">
        <form method="post" action="" enctype="multipart/form-data">
         <!-- <div class="form_row">
            <label>date:</label>
            <input type="date" required="" class="form_input" name="date"/>
          </div>-->
          <div class="form_row">
            <label>Lab No.:</label>
            <select class="form_select" name="lab" required="">
              <?php
			  $q="SELECT DISTINCT `labno` FROM `lab_tbl` WHERE 1";
			  $res=mysql_query($q,$con) or die('unable to select lab number');
			  while($a=mysql_fetch_array($res))
			  {
				  echo "<option value='$a[0]'>$a[0]</option>";}
			  ?>
            </select>
          </div>
          <div class="form_row">
            <label>PC no:</label>
            <input type="text" class="form_input" name="pcno" placeholder="enter PC no. which is having problem" required=""/>
          </div>
          <div class="form_row">
            <label>Type:</label>
            <input type="radio" name="type" required="" value="software">
            Software
            </input>
            <input type="radio" name="type" value="hardware">
            hardware
            </input>
          </div>
          <div class="form_row">
            <label>Priority:</label>
            <select class="form_select" name="prio" required="">
              <option value="Low">low</option>
              <option value="Medium">medium</option>
              <option value="High">high</option>
            </select>
          </div>
          <div class="form_row">
            <label>Detail:</label>
            <textarea required="" name="detail" class="form_textarea" placeholder="Enter description of problem here...."></textarea>
          </div>
          <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" name="sub_insert"/>
          </div>
          <input type="hidden" name="action" value="insert" />
          <div class="clear"></div>
        </form>
      </div>
      <?php
		if(isset($_POST['sub_insert']) && !empty($_POST['sub_insert']) && isset($_POST['lab']) && !empty($_POST['lab']) )
		{
			if($_POST['action'] == "insert")
			{
//				$date=$_POST['date'];
//				$date=NOW();
				$lab=$_POST['lab'];
				$pcno=$_POST['pcno'];
				$type=$_POST['type'];
				$prio=$_POST['prio'];
				$type=$_POST['type'];
				$detail=$_POST['detail'];
				$user=$_SESSION['lt_user'];
				$NONE="NONE";
$q="INSERT INTO `labtr_db`.`report_tbl` (
`id` ,
`date` ,
`status` ,
`detail` ,
`labno` ,
`pcno` ,
`submitter` ,
`priority` ,
`type` ,
`resolvedate` ,
`solver` ,
`li_comment`
)
VALUES (
NULL , NOW(), '0', '$detail', '$lab', '$pcno', '$user', '$prio', '$type', '', '$NONE', ''
)";
				mysql_query($q,$con) or die("There is an error");
				echo "<script>alert('Your problem successfully submitted...');</script>";
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
