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
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {	

		var id = '#dialog';
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 	
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});		
	
});

</script>

<style type="text/css">
body {
font-family:verdana;
font-size:15px;
}

a {color:#333; text-decoration:none}
a:hover {color:#ccc; text-decoration:none}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:550px;
  height:800px;
  display:none;
  z-index:9999;
  padding:20px;
}
#boxes #dialog {
  width:700px; 
  height:800px;
  padding:10px;
  background-color:#ffffff;
}
</style>

</head>

<body>
	<div id="boxes">
<div style="top: 199.5px; left: 551.5px; display: none;" id="dialog" class="window">
<form>
				 <table class="table" ng-hide="!searchText.length" style="background-color:white; opacity:0.8; font-weight:bold; font-size:18px">
				 <tr>
				 <th><h2> Instructions</h2></th>
				 </tr>
					<tr>
						<td><font color = "red">Step 1:</font><br>Go to the <font color = "blue">Settings Page</font> and add the contact details of the people you want to send an email to when you get into the taxi.
					</tr>
					<tr>
					   <td><font color = "red">Step 2:</font><br>After saving your contacts, press <font color = "blue">Continue</font> and you will be brought to the <font color = "blue">Verify Page</font>.</td>
					</tr>
					</br>
					<tr>
					   <td><font color = "red">Step 3:</font><br>On the homepage you will be required to enter the taxi drivers registration number and accept him or decline him.</td>
					</tr>
					</br>
					<tr>
						<td><font color = "red">Step 4:</font><br>After accepting the taxi you will be brought to a page of contacts that you added in <font color = "blue">Step 1</font> </td>
					</tr>
					</br>
					<tr><td><font color = "red">Step 5:</font><br>Select the contact you want to alert that you are leaving your current destination and on the way to your next destination. </td>
					</tr>
					</br>
					<tr>
						<td><font color = "red">Step 6:</font><br>Select the contact you want to alert as you are arriving, or have arrived at your destination. </td>
					</tr>
					

				</table></br>
				</form>
<a href="#" class="close">Close it</a>

</div>
<!-- Mask to cover the whole screen -->
<div style="width: 1478px; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
</div>
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

