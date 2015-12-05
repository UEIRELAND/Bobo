<?php
session_start();
include_once '../includes/connectDB.php';

if(!isset($_SESSION['user']))
{
	header("Location: verify.php");
}else{
	if(!isset($_GET['user_id'])){
		header("Location: verify.php");
	}

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
    <meta name="description" content="messaging contacts when arrived">
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
			<!--Confirmation box of send email to leaving contacts-->
			<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>Email sent!</div>
			
			<!--table of leaving alerts-->
			<div class="table-responsive text-table-margin">          
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Arrived Alert</th>
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
		
		</div><!--end of jumbotron-->
	</div> <!-- /container -->

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
	<script src="../javaScript/bootstrap.min.js"></script>
	<script src="../javaScript/bobo.js"></script>
	
</body>
</html>
