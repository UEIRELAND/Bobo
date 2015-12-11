<?php
	session_start();
    include_once '../includes/connectDB.php';
     
    if(isset($_SESSION['users'])!="")
    {
        header("Location: verify.php");
    }
     
    // shows the username on the right of the navbar
    $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
    $userRow=mysql_fetch_array($res);
	
	//adds taxi details and user_id to account history table
	$mydriver= $_GET['taxi_reg'];
	
	//sends taxi_reg variable to next page
	$_SESSION['driver'] = $mydriver;
	
	$myid= $_GET['user_id'];
	$myid3 = (int)$myid;
	$myid2 = mysql_real_escape_string($myid);
	mysql_query("INSERT INTO user_history(taxi_reg, user_id) VALUES('$mydriver','$myid3')") or die('you have a problem connection '.mysql_error());

	$user_id = $_GET['user_id'];

		$res=mysql_query("SELECT * FROM contacts WHERE user_id= $user_id");

		$contacts = array();

		while($contactRow=mysql_fetch_array($res)){
			$contacts[] = $contactRow;
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
	<script src="../javaScript/Geolocation2.js"></script>
	
	
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
		<form  method='get' action="confirmation2.php">			
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Home Alert</th>
						</tr>
					</thead>
						<?php 
						$count = 0;
						foreach($contacts as $contact){
							$count++;
						?>
					<tbody>
						<tr>
							<td>
								
									<?php
									echo  "<input type='checkbox' id='count".$count."' name='contact_email' value='".$contact['contact_email']."'>"
        .$contact['contact_name'];
		
		$_SESSION['count'.$count] = $contact['contact_email'];
	    $_SESSION['mycount'] =$count;
	
		
		?>
		                     
							</td>
						</tr>
					</tbody>
						<?php
						}
						?>
				</table>
			
			<input type='submit' value='Continue' class="btn btn-primary btn-lg text-button" onclick="getLocation()" />
	
			</form>
			</div>			

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
   
 </body>
</html>