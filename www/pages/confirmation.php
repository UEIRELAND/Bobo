<?php
session_start();
include_once '../includes/connectDB.php';

if(!isset($_SESSION['user']))
{
	header("Location: verify.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

/*
From http://www.html-form-guide.com 
This is the simplest emailer one can have in PHP.
If this does not work, then the PHP email configuration is bad!
*/


$msg="";

	$lat = $_GET['lat'];
	$lgn = $_GET['lgn'];
	
	$from_add = "info@bobo.netau.net"; 

	$to_add = "firminofranciele@gmail.com"; //<-- put your yahoo/gmail email address here

	$subject = "Test Subject";
	$message = "Test Message";
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	
	
	if(mail($to_add,$subject,$message,$headers)) 
	{
		$msg = "Mail sent OK";
	} 
	else 
	{
 	   $msg = "Error sending email!";
	}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="text">
    <meta name="author" content="Niamh Griffin">

    <link rel="icon" href="../images/BoboLogo.png"><!--picture on tab beside title-->
    <title>Bobo App</title>

    
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<!-- Bootstrap core CSS -->
    <link href="../css/text-bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../css/text.css" rel="stylesheet">
    <!-- error handling -->
	<script src="../javaScript/ie-emulation-modes-warning.js"></script>
	
	<!--link to javaScript file-->
	<script src="../javaScript/text.js"></script>
	
	
</head>

<body>

	<div class="container">	
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron" id="text-jumbotron">
			<!--table of leaving alerts-->
			<div class="table-responsive text-table-margin">          
				<table class="table table-hover">
				<tr><td>Just testing</td></tr>
				<tr><td><?php echo $lgn ?></td></tr>
				<tr><td>Just testing</td></tr>
				
				</table>
				
				
			</div>
		          
		    <?php echo $msg ?>
				<p>
				<form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='post'>
				<input class="btn btn-primary btn-lg" type='submit' name='submit' value='Submit'>
				</form>
				</p>
							
           
		
		</div><!--end of jumbotron-->
	</div> <!-- /container -->


	<!-- Bootstrap core JavaScript
	================================================= -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

	<!--This is the Backstretch code which uses a jquery-->
			<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
			<script type="text/javascript" src="../jquery/jquery.backstretch.js"></script>
			<script type="text/javascript">
				$.backstretch(["../images/cab.jpg"]);
			</script>
</body>
</html>
