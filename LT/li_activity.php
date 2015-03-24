<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Panel</title>
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
<script type="text/javascript" src="./js/jquery.js"></script>
<style type="text/css">
#toggle-view {
	list-style:none;
	font-family:arial;
	font-size:11px;
	margin:15px 5px;
	padding:0;
	width:auto;
}
#toggle-view li {
	margin:10px 30px;
	border-bottom:1px solid #ccc;
	position:relative;
	cursor:pointer;
}
#toggle-view h3 {
	margin:0;
	font-size:14px;
}
#toggle-view h3 .sp{
	text-align:left;
	padding:2px 15px 2px 15px;
	color:#000;
	display:inline-block;
	overflow:hidden;
	text-align:center;
}
#toggle-view span {
	right:5px;
	top:0;
	color:#ccc;
	font-size:16px;
}
#toggle-view .panel {
	margin:5px 0;
	display:none;
	font-size:14px;
}
</style>
<script type="text/javascript">

$(document).ready(function () {
	
	$('#toggle-view li').click(function () {

		var text = $(this).children('div.panel');

		if (text.is(':hidden')) {
			text.slideDown('200');
		} else {
			text.slideUp('200');
		}
		
	});

});

</script>

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
       <li><a style="border:3px ridge #fff;" href="li_home.php">Notifications</a></li>
      <li><a class="active" href="li_activity.php">Activity<span style="color:#F00; text-shadow:none;"></span></a></li>
      <li><a href="li_editdetail.php">Edit Detail</a></li>
      <li class="last-item"><a href="logout.php">Logout<div style="font-size:12px; font-style:italic; color:#F00; text-shadow:none;">logged in as <?php echo $_SESSION['lt_li']?></div></a></li>   </ul>
    </ul>
  </nav>
</div>
<div class="row-3" >
<div class="content" >
<?php

$ret=li_chksession();
if($ret == 1){
?>
      <?php				
	if(isset($_SESSION['lt_li']))
		$user=$_SESSION['lt_li'];
		?>

<h1 style="text-align:center; font-size:24px; padding:20px; text-decoration:underline;">&raquo; &nbsp;History of bug you solved</h1></br></br></br>
 <?php
$q="SELECT * FROM `report_tbl` WHERE `solver`='$user' ORDER BY `id` DESC";
$res=mysql_query($q,$con) or die("There is an error");
?>		
<ul id="toggle-view">
  <li>
    <h3>            
            <div class="sp" style="width:140px;">Submit Date</div>
            <div class="sp" style="width:50px;">Lab No.</div>
            <div class="sp" style="width:50px;">PC No.</div>
            <div class="sp" style="width:100px;">Submitted By</div>
            <div class="sp" style="width:140px;">Resolve Date</div>
            <div class="sp" style="width:50px;">Type</div>
            <div class="sp" style="width:50px;">Status</div>
</h3>
  </li>
</ul>
	<?php			
		while($arr=mysql_fetch_array($res)){
			?>
<ul id="toggle-view">
  <li>
    <h3>            
            <div class="sp" style="width:140px;"><?php echo $arr['date']?></div>
            <div class="sp" style="width:50px;"><?php echo $arr['labno']?></div>
            <div class="sp" style="width:50px;"><?php echo $arr['pcno']?></div>
            <div class="sp" style="width:100px;"><?php echo $arr['submitter']?></div>
            <div class="sp" style="width:140px;"><?php echo $arr['resolvedate']?></div>
            <div class="sp" style="width:50px;"><?php echo $arr['type']?></div>
            <div class="sp" style="width:55px;"><?php if($arr['status']==1)
															echo "Solved";
													 else
													 		echo "<div style='color:red;'>Unsolved</div>";?></div>
 	        </h3>
    <div class="panel" style="display: none;">
      <p><?php echo $arr['detail'];?></p>
    </div>

    <div class="panel" style="display: none;">
      <p><?php if($arr['li_comment'] != null )	echo "<hr/>".$arr['li_comment'];?></p>
    </div>
  </li>
</ul>
            <?php
            }
		?>


            <?php
	}
		?>
        
    </div>
  </div>
</div>
</header>
</body>
</html>