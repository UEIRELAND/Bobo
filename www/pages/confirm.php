<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$mydriver= $_GET['taxi_reg'];
$myid= $_GET['user_id'];
$myid3 = (int)$myid;
$myid2 = mysql_real_escape_string($myid);

mysql_query("INSERT INTO user_history(taxi_reg, user_id) VALUES('$mydriver','$myid3')") or die('you have a problem connection '.mysql_error());


?>

<!DOCTYPE html>
<html lang="en" ng-app="myApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
	<meta name="description" content="verify">
    <meta name="author" content="Youcef">
    <link rel="icon" href="BoboLogo.png"><!--picture on tab beside title-->

    <title>Bobo App</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this page -->

    <!-- error handling -->
	<script src="assets/js/ie-emulation-modes-warning.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- AngularJS Link---->
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

	<!--Own CSS-->
	<script src="css/search.css"></script>
</head>

<body>

		<!--this is the code for the navbar-->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="verify.php"> BoBo</a>
						
                </div>
                <div class="collapse navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="verify.php"data-toggle="collapse" data-target=".navbar-collapse">Home</a></li>
                        <li><a href="account.php" data-toggle="collapse" data-target=".navbar-collapse">Account</a></li>
                        <li><a href="settings.php" data-toggle="collapse" data-target=".navbar-collapse">Settings</a></li>
                    </ul>
					
					<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $userRow['username']; ?> <b class="caret"></b></a>
									<ul class="dropdown-menu">
										
										<li>&nbsp;<a href="logout.php?logout">Sign Out</a></li>
									</ul>
							</li>
						</ul>
                </div>
            </div>
			
        </nav>
		
		<div id= container>
		<p>The driver is <?php echo$mydriver?></p>
		</div>

</body>
</html>
