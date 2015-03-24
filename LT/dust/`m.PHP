<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Labtrack Login</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login-log.php" method="post">
			<h1>Labtrack Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" name="password"/>
			</div>
			<div>
				<input type="radio" id="type" name="type" value="1" checked>Student</input>
				<input type="radio" id="type" name="type" value="2" >Admin</input>
				<input type="radio" id="type" name="type" value="3" >Lab Incharge</input>
			</div>
			<div>
				<input type="submit" value="Login" name="login"/>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->    		
</body>
</html>
