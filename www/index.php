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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BoBo - Login & Registration System</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
	<!--This is the Backstretch code which uses a jquery-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.backstretch.js"></script>
	<script type="text/javascript"> 
		$.backstretch(["images/cab.jpg"]); 
	</script>

<center>
	<img src="images/BoboLogo2.png">
	<div id="login-form">
		<form method="post">
			<table align="center" width="30%" border="0">
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
					<td><button><a href="pages/register.php">Sign Up Here</a></button></td>
				</tr>
			</table>
		</form>
	</div>
</center>
</body>
</html>