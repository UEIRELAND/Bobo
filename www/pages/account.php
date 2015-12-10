<?php
	session_start();
    include_once '../includes/connectDB.php';
     
    if(isset($_SESSION['users'])!="")
    {
        header("Location: verify.php");
    }
     
    $sql = 'SELECT user_id, fname, lname, username, email, DOB, phone FROM users';
    mysql_select_db ('../dbtest');
    $retval = mysql_query($sql, $conn);
    //shows user info on the table
    $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
    $row=mysql_fetch_array($res);   
    // shows the username on the right of the navbar
    $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
    $userRow=mysql_fetch_array($res);
	
	$sql = 'SELECT user_id, fname, lname, username, email, DOB, phone FROM users';
	$sql2 = 'SELECT taxi_reg FROM user_history';
	mysql_select_db ('../dbtest');
	$retval = mysql_query($sql, $conn);
	$retval = mysql_query($sql2, $conn);
	
	//get user history
		$ret=mysql_query("SELECT * FROM user_history WHERE user_id=".$_SESSION['user']);

		$history = array();

		while($historyrow=mysql_fetch_array($ret)){
			$history[] = $historyrow;
		}
	
	
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Bobo App</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="account">
    <meta name="author" content="Fran">
	<!--picture on tab beside title-->
	<link rel="icon" href="../images/BoboLogo2.ico">
	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/instructions.css" rel="stylesheet">
	
	
</head>

<body>
	<!--This is the Backstretch code which uses a jquery-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
                    <li><a href="verify.php">Home</a></li>
                    <li class="active"><a href="account.php">Account</a></li>
                    <li><a href="settings.php">Settings</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="button" href="#popup1">Help</a></li>
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
			<div id="account">
				<form method="post">
					<table class="table" ng-hide="!searchText.length" style="background-color:white; opacity:0.8; font-weight:bold; font-size:18px">
						<tr>
							<th colspan = "2"><h2> Account Information</h2></th>
						</tr>
						<tr>
							<td>First Name: </td>
							<td><?php echo $row['fname']?></td>
						</tr>
						<tr>
						   	<td>Last  Name: </td>
						   	<td><?php echo $row['lname']?></td>
						</tr>
						<tr>
						   	<td>Username: </td>
						   	<td><?php echo $row['username']?></td>
						</tr>
						<tr>
							<td>Email: </td>
							<td><?php echo $row['email']?></td>
						</tr>
					</table>
					
					</br>
		
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">View Taxi history</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Taxi History</h4>
      </div>
      <div class="modal-body">
        							<td>Email: </td>
							<td><?php echo $row['taxi_reg']?></td>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>	
			
				</form>
				
			</div>
		
		</div><!--end of jumbotron-->
	</div><!--end of container-->
				
	<!--this is the code for the footer navbar-->
	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<center><h4>© 2015 Bobo App</h4></center>
			</div>
		</div>
	</nav>
	
	
	<div id="popup1" class="overlay">
        <div class="popup">
            <h2>Instructions</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form id="instructions-form">
                    <table>
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
                    </table>
                    </br>
                </form>
            </div>
        </div>
    </div>
        
    <!-- Bootstrap core JavaScript
	================================================= -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../javaScript/bootstrap.min.js"></script>
	<script src="../javaScript/bobo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>

 </body>
</html>