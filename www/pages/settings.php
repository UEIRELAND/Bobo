<?php
session_start();
if(isset($_SESSION['contacts'])!="")
{
	header("Location: verify.php");
}
include_once '../includes/connectDB.php';

if(isset($_POST['btn-contact']))
{
	$cnme =  mysql_real_escape_string($_POST['cnme']);
	$cemail =  mysql_real_escape_string($_POST['cemail']);
	$cphone = (mysql_real_escape_string($_POST['cphone']));
	
	if(mysql_query("INSERT INTO contacts(contact_name,contact_email,contact_phone) VALUES('$cnme','$cemail','$cphone')"))
	{
		?>
        <script>alert('Contact Saved ');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('Error saving Contact! ');</script>
        <?php
	}
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
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

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../css/homepage.css" rel="stylesheet">

    <!-- error handling -->
	<script src="../javaScript/ie-emulation-modes-warning.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- AngularJS Link---->
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>-->

	
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
                    <a class="navbar-brand" href="verify.php">BoBo</a>
						
                </div>
                <div class="collapse navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="verify.php"data-toggle="collapse" data-target=".navbar-collapse">Home</a></li>
                        <li><a href="account.php" data-toggle="collapse" data-target=".navbar-collapse">Account</a></li>
                        <li class="active"><a href="settings.php" data-toggle="collapse" data-target=".navbar-collapse">Settings</a></li>
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
		
			<center>
				<div id="login-form">
				<form method="post">

					<table align="center" width="100%" border="0">
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
							<td><button><a href="verify.php">Continue</a></button></td>
						</tr>
					</table>
				</form>
			</div>
		</center>
						
			<footer class="navbar-default navbar-fixed-bottom">
			<div class="container-fluid">
			<center>
				<span><p>Copyright &copy; <a href="bobo15@gmail.com" title="bobo15@gmail.com">bobo15@gmail.com</a></p></span>
			</center>
			</div>
	</footer>
			
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
	
	<!--This is the Backstretch code which uses a jquery-->
			<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
			<script type="text/javascript" src="../jquery/jquery.backstretch.js"></script>
			<script type="text/javascript">
				$.backstretch(["../images/ny2.jpg"]);
			</script>
	
	
	
 
 </body>
</html>