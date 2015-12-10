<?php
session_start();
include_once '../includes/connectDB.php';
if(!isset($_SESSION['user']))
{
	header("Location: verify.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
  	$lat = $_GET['lat'];
	$lgn = $_GET['lgn'];
/*
From http://www.html-form-guide.com 
*/	
if(isset($_POST['submit']))
{	
    $lat = $_GET['lat'];
	$lgn = $_GET['lgn'];
	
	$fname = $userRow['fname'];
	$lname = $userRow['lname'];
	
	$from_add = "info@bobo.netau.net"; 
	$to_add = "firminofranciele@gmail.com"; //<-- put your yahoo/gmail email address here
	$subject = "BoBo App:".$fname." ".$lname." got in a taxi.";
	$message = "
	<html>
	<head>
	<title>JOURNEY DETAILS</title>
	</head>
	<body>
	<table>
	<tr>
	<td>TAXI REGISTRATION No:</td>
	<td>" .$_SESSION['taxi_reg']. "</td>
	</tr>
	<tr>
	<td>LOCATION:</td>
	<td>" .$lat. "</td>
	<td>" .$lgn. "</td>
	</tr>
	</table>
	<img src=https://maps.googleapis.com/maps/api/staticmap?center=".$lat.",".$lgn."&zoom=17&size=400x400&markers=color:blue|".$lat.",".$lgn."&key=AIzaSyCtwsCFvP86ikM2CbVZNz23cP_1Axb9JbE>
	</body>
	</html>
	";
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	
	if(mail($to_add,$subject,$message,$headers)) 
	{
		$msg = "Mail sent OK";
		
	} 
	else 
	{
 	   $msg = "Error sending email!";
	}
	
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
				<tr><td>MY JOURNEY DETAILS</td></tr>
				<tr><td>LOCATION: <?php echo $lat.",".$lgn; ?></td></tr>
                <tr><td>TAXI REGISTRATION No:
								
				<?php echo $amountContacts = $_SESSION['mycount'];
				
				for($i=0; $i<= $amountContacts; $i++){
					
					echo $_SESSION['count'.$i]."<br>";
				}	
				?>
				
				</td></tr>
	  	        </table>
		
		<center><img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $lat.",".$lgn; ?>&zoom=17&size=400x400&markers=color:blue|<?php echo $lat.",".$lgn; ?>&key=AIzaSyCtwsCFvP86ikM2CbVZNz23cP_1Axb9JbE"></center>
				
				
			</div>
		          
		    <?php echo $msg ?>
				<p>
				<form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='post'>
				<input class="btn btn-primary btn-lg" type='submit' name='submit' value='Submit' onclick="msgHome.php" >
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
