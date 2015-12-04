<?php
session_start();
include_once '../includes/connectDB.php';

if(!isset($_SESSION['user']))
{
	header("Location: verify.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$mydriver= $_GET['taxi_reg'];
+$myid= $_GET['user_id'];
+$myid3 = (int)$myid;
+$myid2 = mysql_real_escape_string($myid);
+
+mysql_query("INSERT INTO user_history(taxi_reg, user_id) VALUES('$mydriver','$myid3')") or die('you have a problem connection '.mysql_error());
+
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
<<<<<<< HEAD
			
			
		<!--table of leaving alerts-->
		<div class="table-responsive text-table-margin">          
			<table class="table text-table table-hover text-tableOne">
				<thead>
					<tr>
						<th>Leaving Alert Contacts</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a onclick="myClickOne()">Mom</a>
							<img id="TickOne" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="myClickTwo()">Dad</a>
							<img id="TickTwo" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="myClickThree()">Ann</a>
							<img id="TickThree" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="myClickFour()">Fran</a>
							<img id="TickFour" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="myClickFive()">Daniel</a>
							<img id="TickFive" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="myClickSix()">Sean</a>
							<img id="TickSix" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="myClickSeven()">Youcef</a>
							<img id="TickSeven" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="myClickEight()">Niamh</a>
							<img id="TickEight" src="../images/text-tick.png" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		
			
		<!--Submit button-->
		<button <a onClick="home()" type="button" href="msgArrived.php" class="btn btn-primary btn-lg text-button">Continue</a></button>
		
		
	</div><!--end of jumbotron-->

=======
			<!--table of leaving alerts-->
			<div class="table-responsive text-table-margin">          
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
								<a onclick="myClickOne()">
										<?php
										echo  $contact['contact_name'] ; 
										?>
								</a>
								<img id="TickOne" src="../images/text-tick.png" />
							</td>
						</tr>
					</tbody>
										<?php
										}
										?>
				</table>
				
				
			</div>
						
			<!--Submit button-->
			<button type="button" class="btn btn-primary btn-lg text-button"><a href="msgHome.php">Continue</a></button>
>>>>>>> 813fed646818d1db1e6dfef6ebfca1ddbfe3cb36
		
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
