<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
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
<div class="row-1">
  <h1> <a class="logo" href="index.php"></a> <strong class="slog">Labtrack</strong> </h1>
</div>
<div class="row-2 slog">
  <nav>
    <ul class="menu">
      <li><a class="active" style="border:3px ridge #fff;" href="home.html">Notifications</a></li>
      <li><a href="activity.html">Activity<span style="color:#F00; text-shadow:none;"><?php echo "(2)";?></span></a></li>
      <li><a href="feedback.html">Messages<span style="color:#F00; text-shadow:none;"><?php echo "(2)";?></span></a></li>
      <li><a href="feedback.html">Edit Detail</a></li>
      <li class="last-item"><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</div>
<div class="row-3" align="center">
<div class="content" >
<?php

$ret=chksession();
if($ret == 1){
?>
      <?php
				
		$q="SELECT * FROM `report_tbl` WHERE 1";
		$res=mysql_query($q,$con) or die("There is an error");
		
		echo "
 <table class='tbl'>
            <tr style='position:relative'	>
            <td>ID</td>
            <td>Date</td>
            <td>Lab No.</td>
            <td>Pc No.</td>
            <td>Submitted by</td>
            <td>Type</td>
            <td></td>
			<td></td>
            </tr>";
			
		while($arr=mysql_fetch_array($res)){
			?>
            <tr>
            <td><?php echo $arr['id']?></td>
            <td><?php echo $arr['date']?></td>
            <td><?php echo $arr['labno']?></td>
            <td><?php echo $arr['pcno']?></td>
            <td><?php echo $arr['submitter']?></td>
            <td><?php echo $arr['type']?></td>
            <td><?php echo "<a href=''>Detail</a>"?></td>
            <td><?php echo "<a href='approve.php?id=$arr[0]'>solved</a>"?></td>
	            </tr>
            <?php
            }
	}
		?>
    </div>
  </div>
</div>
</header>
</body>
</html>
