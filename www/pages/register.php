<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: msgHome.php");
}
include_once '../includes/connectDB.php';

if(isset($_POST['btn-signup']))
{
	$fnme =  mysql_real_escape_string($_POST['fnme']);
	$lnme =  mysql_real_escape_string($_POST['lnme']);
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['upass']));
	$age = mysql_real_escape_string($_POST['age']);
	$phne = (mysql_real_escape_string($_POST['phne']));
	
	if(mysql_query("INSERT INTO users(fname,lname,username,email,password,DOB,phone) VALUES('$fnme','$lnme','$uname','$email','$upass','$age', '$phne')"))
	{
		?>
        <script>alert('successfully registered ');
        window.location.href = "../index.php";
        </script>
        <?php
	}
	else
	{
		?>
        <script>alert('error while registering you...');</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login & Registration System</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" />

</head>
<body>

	<!--This is the Backstretch code which uses a jquery-->
			<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
			<script type="text/javascript" src="../jquery/jquery.backstretch.js"></script>
			<script type="text/javascript">
				$.backstretch(["../images/cab.jpg"]);
			</script>

<center>
<div id="login-form">
<form method="post">

<table align="center" width="30%" border="0">

<tr>
<td><h2>Sign Up</h2></td>
</tr>

<tr>
<td><input type="text" name="fnme" placeholder="First Name" required /></td>
</tr>
<tr>
<td><input type="text" name="lnme" placeholder="Last Name" required /></td>
</tr>
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="upass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><input type="date" name="age" placeholder="DOB" required /></td>
</tr>
<tr>
<td><input type="text" name="phne" placeholder="Phone number" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><button><a href="../index.php">Sign In Here</a></button></td>
</tr>
</div>
</table>
</form>
</div>
</center>
</body>
</html>
