<?php
session_start();
include_once '../includes/connectDB.php';

if(!isset($_SESSION['user']))
{
	header("Location: ../index.php");
}	
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp">
  <head>
    <title>Bobo App</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="verify">
    <meta name="author" content="Youcef">

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	

    <link rel="icon" href="../images/BoboLogo.png"><!--picture on tab beside title-->

    <title>Bobo App</title>


    <!-- error handling -->
	<script src="assets/js/ie-emulation-modes-warning.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- AngularJS Link---->
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

	<!--Own CSS-->
	<script src="../css/search.css"></script>

</head>

<body>
	
	<!--This is the Backstretch code which uses a jquery-->
	<script type="text/javascript" src="../jquery/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../jquery/jquery.backstretch.js"></script>
	<script type="text/javascript">
		$.backstretch(["../images/cab.jpg"]);
	</script>

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
	
	<div class="container">
		<div class="jumbotron">
			<div id="login-form">
				<form method="post">
						<div  ng-controller="customersCtrl" > 
							<label>SEARCH &nbsp;&nbsp; <input placeholder="Taxi Reg/Reference No" ng-model="searchText" ></label>
							<br>
								<table class="table" ng-hide="!searchText.length" style="background-color:white; opacity:0.8; font-weight:bold; font-size:18px">
									<tr>
										<th>Profile Photo</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Registration</th>
									</tr>
									<tr ng-repeat="x in drivers | filter:searchText | orderBy:'last_name' "><br>
										<td><img ng-src="{{image}}"/>
										<td>{{ x.first_name}}</td>
										<td>{{ x.last_name}}</td>
											<td>{{ x.taxi_reg}}</td>
									</tr>
									<tr colspan ="4">
									   <td><p>&nbsp;&nbsp;Accept taxi</p>
									   <td ><button class= "btn btn-danger" onClick="history.go(0)">&nbsp;&nbsp;No&nbsp;&nbsp;</button></td>
									   <td> 
										<a type="submit" class= "btn btn-success" href="msgLeaving.php?user_id=<?php echo $userRow['user_id'];?>&taxi_reg={{searchText}}">Yes</a>
									</tr>
								</table>
						</div>
					</form>
				</div> <!--end of login form-->	
			</div> <!--end of jumbo-->
		</div><!--end of container-->
						
				
        
    <!--this is the code for the footer navbar-->
	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<center><h4>© 2015 Bobo App</h4></center>
			</div>
		</div>
	</nav>
        
    	<!--angluar script file-->
	<script src="../javaScript/angular.min.js"></script>
	<!-- Bootstrap core JavaScript
	================================================= -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../javaScript/bootstrap.min.js"></script>
	<script src="../javaScript/bobo.js"></script>
	
 
 </body>
</html>

