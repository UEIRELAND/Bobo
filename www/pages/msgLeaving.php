<?php
	//keeps user logged in
	session_start();
	include_once '../includes/connectDB.php';

	if(!isset($_SESSION['user']))
	{
		header("Location: verify.php");
	}else{
		if(!isset($_GET['user_id'])){
			header("Location: verify.php");
		}
	/*gets user_id of the user currently logged in to be sent to history table
	$user_id = $_GET['user_id'];

	$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);*/

	//sends taxi_reg variable to next page
	$_SESSION['driver'] = $mydriver;
	
	//adds taxi details and user_id to account history table
	$mydriver= $_GET['taxi_reg'];
	$myid= $_GET['user_id'];
	$myid3 = (int)$myid;
	$myid2 = mysql_real_escape_string($myid);
	mysql_query("INSERT INTO user_history(taxi_reg, user_id) VALUES('$mydriver','$myid3')") or die('you have a problem connection '.mysql_error());

	$user_id = $_GET['user_id'];

		$res=mysql_query("SELECT * FROM contacts WHERE user_id= $user_id");

		$contacts = array();

		while($userRow=mysql_fetch_array($res)){
			$contacts[] = $userRow;
		}
	}
	$suser = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bobo App</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="text">
    <meta name="author" content="Niamh Griffin">
    <!--picture on tab beside title-->
	<link rel="icon" href="../images/BoboLogo2.ico">
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
	<script src="../javaScript/Geolocation.js"></script>
	
</head>

<body>

	<!--This is the Backstretch code which uses a jquery-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../jquery/jquery.backstretch.js"></script>
	<script type="text/javascript">
		$.backstretch(["../images/cab.jpg"]);
	</script>

	<div class="container">	
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron" id="text-jumbotron">

			<!--table of leaving alerts-->
			
		<div class="table-responsive text-table-margin">  
			<form method="post">			
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Leaving Alert</th>
						</tr>
					</thead>
						<?php 
						
						foreach($contacts as $contact){
						?>
					<tbody>
						<tr>
							<td>
								
									<?php
									echo  "<input type='checkbox' name='contact_name' value='".$contact['contact_name']."'>"
        .$contact['contact_name'];?>
							</td>
						</tr>
					</tbody>
						<?php
						}
						?>
				</table>
			</div>
			<input type="submit" value="continue"  class="btn btn-primary btn-lg text-button" onclick="getLocation()"/>
	
			</form>
						
			<!--Submit button-->

		

		

			<!--button class="btn btn-primary btn-lg text-button" onclick="getLocation()" type="button">Continue</button-->
		    <script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGwJJ6jnnh4FJ07Zf79PQiBe7NXE4yKn8&signed_in=true&callback=initMap"></script>

		</div><!--end of jumbotron-->
	</div> <!-- end of container -->
	
	
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

	<script src="../javaScript/bootstrap.min.js"></script>
	<script src="../javaScript/bobo.js"></script>

	
</body>
</html>
