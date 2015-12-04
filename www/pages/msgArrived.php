<?php
session_start();
include_once '../includes/connectDB.php';

if(!isset($_SESSION['user']))
{
	header("Location: verify.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
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
    <link href="../css/text-bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../css/text.css" rel="stylesheet">
    <!-- error handling -->
	<script src="assets/js/ie-emulation-modes-warning.js"></script>
	
	<!--link to javaScript file-->
	<script src="../javaScript/text.js"></script>
	
</head>

<body>

	<div class="container">	
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron" id="text-jumbotron">
			
			
		<!--table of home alerts-->
		<div>          
			<table class="table" ng-hide="!searchText.length" style="background-color:white; opacity:1; font-weight:bold; font-size:18px">
				<thead>
					<tr>
						<th>Home Alert Contacts</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a onclick="HomeOne()">Mom</a>
							<img id="HomeTickOne" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="HomeTwo()">Dad</a>
							<img id="HomeTickTwo" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="HomeThree()">Ann</a>
							<img id="HomeTickThree" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="HomeFour()">Fran</a>
							<img id="HomeTickFour" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="HomeFive()">Daniel</a>
							<img id="HomeTickFive" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="HomeSix()">Sean</a>
							<img id="HomeTickSix" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="HomeSeven()">Youcef</a>
							<img id="HomeTickSeven" src="../images/text-tick.png" />
						</td>
					</tr>
					<tr>
						<td><a onclick="HomeEight()">Niamh</a>
							<img id="HomeTickEight" src="../images/text-tick.png" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		
		<!--Submit button-->
		<button type="button" class="btn btn-primary btn-lg text-button"><a href="verify.php">I've Arrived</a></button>
		
		
	</div><!--end of jumbotron-->

		
	</div> <!-- /container -->


	<!-- Bootstrap core JavaScript
	================================================= -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!--script src="../dist/js/bootstrap.min.js"></script-->
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<!--script src="../assets/js/ie10-viewport-bug-workaround.js"></script-->
	
	<!--This is the Backstretch code which uses a jquery-->
			<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
			<script type="text/javascript" src="../jquery/jquery.backstretch.js"></script>
			<script type="text/javascript">
				$.backstretch(["../images/cab.jpg"]);
			</script>
	

</body>
</html>
