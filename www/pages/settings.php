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
    // shows the username on the right of the navbar
    $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
    $userRow=mysql_fetch_array($res);
 
if(isset($_POST['btn-contact']))
{
    $userid = (mysql_real_escape_string($_POST['user_id']));
    $cnme =  mysql_real_escape_string($_POST['cnme']);
    $cemail =  mysql_real_escape_string($_POST['cemail']);
    $cphone = (mysql_real_escape_string($_POST['cphone']));
     
    $suser = $_SESSION['user'];
     
    if(mysql_query("INSERT INTO contacts(user_id,contact_name,contact_email,contact_phone) VALUES('$suser','$cnme','$cemail','$cphone')"))
     {
        ?>
        <script>alert('Contact Saved');</script>
        <?php
    }
    else
    {
        ?>
        <script>alert('Error saving Contact! ');</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
	<meta name="description" content="settings">
    <meta name="author" content="Youcef & Dano">
    <!--picture on tab beside title-->

    <title>Bobo App</title>
	<link href="../css/instructions.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../css/homepage.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- AngularJS Link---->
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>-->

	
</head>

<body>
	<!--This is the Backstretch code which uses a jquery-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../jquery/jquery.backstretch.js"></script>
	<script type="text/javascript">
		$.backstretch(["../images/ny2.jpg"]);
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
                        <li><a href="account.php">Account</a></li>
                        <li class="active"><a href="settings.php">Settings</a></li>
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
		
			<center>
				<div id="login-form">
				
				<form method="post">

					<table align="center" width="100%" border="0">
						<tr>
							<td><h2>Add some contacts here!</h2></td>
						</tr>
						<tr>
							<td><input type="text" name="cnme" placeholder="Contact Name" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="cemail" placeholder="Contact E-Mail" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="cphone" placeholder="Contact Mobile Number" required /></td>
						</tr>
						<tr>
						   <td><button type="submit" name="btn-contact">Save Contact</button></td>
						</tr>
						<tr>
							<td><button><a href="verify.php">Search Taxi</a></button></td>
						</tr>
					</table>
				</form>
			</div>
		</center>
		
		</div>	<!--end of jumbotron-->
			
	</div>	<!--end of container-->
        
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

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
	
	
	
	<!-- Bootstrap core JavaScript
	================================================= -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../javaScript/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../javaScript/ie10-viewport-bug-workaround.js"></script>
	
 </body>
</html>
