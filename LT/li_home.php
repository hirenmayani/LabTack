<!DOCTYPE html>
<html lang="en">
<head>
<title>LabTrack - Lab incharge panel</title>
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

function changer()
{
x=false;
}

$(document).ready(function () {
	var x=true;

	$('#comment').focus(function () {
      x=false;
	});

	$('#toggle-view li').click(function () {

		var text = $(this).children('div.panel');

		if (!text.is(':hidden') && x==true) {
			text.slideUp('200');
		} else {
			text.slideDown('200');
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
       <li><a class="active" style="border:3px ridge #fff;" href="li_home.php">Notifications</a></li>
      <li><a href="li_activity.php">Activity<span style="color:#F00; text-shadow:none;"></span></a></li>
      <li><a href="li_editdetail.php">Edit Detail</a></li>
      <li class="last-item"><a href="logout.php">Logout<div style="font-size:12px; font-style:italic; color:#F00; text-shadow:none;">logged in as <?php echo $_SESSION['lt_li']?></div></a></li>   </ul>
  </nav>
</div>
<div class="row-3" >
<div class="content" >
<?php

$ret=li_chksession();
if($ret == 1){
?>
      <?php
		$lab=(int)$_COOKIE['labno'];
		$q="SELECT * FROM `report_tbl` WHERE `status`=0	AND	`labno`=$lab";
		$res=mysql_query($q,$con) or die("There is an error");
?>		
<ul id="toggle-view">
  <li>
    <h3>            
            <div class="sp" style="width:140px;">Date</div>
            <div class="sp" style="width:55px;">Lab No.</div>
            <div class="sp" style="width:55px;">PC No.</div>
            <div class="sp" style="width:100px;">Submitted By</div>
            <div class="sp" style="width:70px;">Type</div>
            <div class="sp" style="width:70px;">Priority</div>
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
            <div class="sp" style="width:55px;"><?php echo $arr['labno']?></div>
            <div class="sp" style="width:55px;"><?php echo $arr['pcno']?></div>
            <div class="sp" style="width:100px;"><?php echo $arr['submitter']?></div>
            <div class="sp" style="width:70px;"><?php echo $arr['type']?></div>
            <div class="sp" style="width:70px;"><?php echo $arr['priority']?></div>
 	        </h3>
    <div class="panel" style="display: none;">
      <p><?php echo $arr['detail'];?></p>
    </div>
	
    <div class="panel" style="display: none;">
    
    <form action="approve.php" method="post">
      <hr/><p>Comment: <textarea cols="40" rows="7" placeholder="Enter your comment here..." name="comment" id="comment"></textarea></p>
				<input type="hidden" name="id" value="<?php echo $arr['id']; ?>">
				<input type="submit" onClick="" name="both" value="comment & Solve"/>
				<input type="submit" onClick="" name="solve" value="Solve Only"/>
				<input type="submit" onClick="" name="com" value="comment Only"/>
				<input type="submit" onClick="" name="donothing" value="Do Nothing"/>
                </form>
                
	    <div class="sp" style="width:800px;"><?php /*?><?php echo "<a href='approve.php?id=$arr[0]&solve=1&com=1'>Comment & Set as Solved &nbsp;||</a>&nbsp;&nbsp;&nbsp;";
												   echo "<a href='approve.php?id=$arr[0]&solve=1&com=0'>Solve Only&nbsp;||&nbsp;&nbsp;</a>";
												   echo "<a href='approve.php?id=$arr[0]&solve=0&com=1'>Comment Only&nbsp;||&nbsp;&nbsp;</a>";
												   echo "<a href='approve.php?id=$arr[0]&solve=0&com=0'>do nothing&nbsp;&nbsp;</a>";?><?php */?></div>
	</div>
  </li>
</ul>
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
