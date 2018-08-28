<!DOCTYPE html>
<?php 
	ini_set('display_errors', 1);
	$pageTitle = ""; 

	include('../includes/sessions.inc.php');
	include('../classes/user.class.php');
	require('../includes/conn.inc.php');	

	if (isset($_SESSION['userID']))
		$userID = implode($_SESSION['userID']);

?>

<html class="full" lang="en">
<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">

          <title><?php echo $pageTitle; ?></title>
          <link href="../css/bootstrap.min.css" rel="stylesheet">
          <link href="../css/mobileFirst.css" rel="stylesheet">
		  
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	  
		  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
		  <script src="../js/bootstrap.min.js"></script>

		  <link rel="stylesheet" type="text/css" media="only screen and (min-width:601px)" href="../css/carousel.css">
		  <link rel="stylesheet" type="text/css" media="only screen and (min-width:601px)" href="../css/biggerScreen.css">
</head>
<body>
<div class="container">

<h1 style="color:white";>
<?php print_r($_SESSION); ?>
</h1>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	   <div class="container-fluid" id="navfluid">
	       <div class="navbar-header">
	           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
	               <span class="sr-only">Toggle navigation</span>
	               <span class="icon-bar"></span>
	               <span class="icon-bar"></span>
	               <span class="icon-bar"></span>
	            </button>
	            <div class="navbar-brand">
	            	<a href="#"><img src="../images/logo.png" class="img-responsive"></a>
	            </div>
	       </div>
	       <div class="collapse navbar-collapse" id="navigationbar">
				  <ul class="nav navbar-nav">
		<?php
			if (isset($_SESSION['admin']) == 1)  {
		?>	
					<li><a href="add.php">Add New Festival</a></li>
					<li><a href="view.php">View Festivals</a></li>
					<li><a href="view-users.php">View Users</a></li>
					<li><a href="../index.php">Back To Home</a></li>					
					<li><a href="../includes/logout.inc.php">Logout</a></li>
		<?php
		}
			if ( !isset($_SESSION['admin']) ) {


		?>	
				<li><a href="login.php">Login</a></li>
		<?php
				}
		?>	

				</ul>
	      </div><!-- /.navbar-collapse -->
	   </div><!-- /.container-fluid -->
	</nav>