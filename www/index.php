<?php
session_start();
include_once 'includes/connectDB.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: pages/verify.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: pages/verify.php");
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}
}
//action button as option for user to register and not login
if(isset($_POST['btn-register']))
{
		header("Location: pages/register.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BoBo - Login & Registration System</title>

    <!-- Custom styles for this page -->
    <link href="../css/homepage.css" rel="stylesheet">
	
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	


	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	
	<!--custom css-->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="icon" href="images/BoboLogo2.png">
</head>

<body>
	<<!--This is the Backstretch code which uses a jquery-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.backstretch.js"></script>
	<script type="text/javascript"> 
		$.backstretch(["images/cab.jpg"]); 
	</script>
	
	<center>
		<div class="container">
			<img src="images/BoboLogo2.png">
			<div id="login-form">
				<form method="post">
					<table align="center" width="100%" border="0">
						<tr>
							<td><input type="text" name="email" placeholder="Your Email Please" required /></td>
						</tr>
						<tr>
							<td><input type="password" name="pass" placeholder="Your Password" required /></td>
						</tr>
						<tr>
							<td><button type="submit" name="btn-login">Sign In</button></td>
						</tr>
						<tr>
							<td><button><a id="register" href="pages/register.php">Register Here</a></button></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</center>
	
	<!--this is the code for the footer navbar-->
	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<center><h4>© 2015 Bobo App</h4></center>
			</div>
		</div>
	</nav>
	
	<!-- Bootstrap core JavaScript
	================================================= -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="javaScript/jquery.min.js"></script>
	<script src="../javaScript/bootstrap.min.js"></script>
	<script src="../javaScript/bobo.js"></script>

</body>
</html>
