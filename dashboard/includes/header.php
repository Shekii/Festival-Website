<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	$pageTitle = ""; 
	require('../includes/conn.inc.php');
	include('../includes/sessions.inc.php');
	
  	include('../classes/user.class.php');
 	include ('../classes/event.class.php');	

  $user = new User();

if ($user->is_loggedin() ) {

	$userID = implode($_SESSION['userID']);  

	$account = $user->getUser($userID);
}



?>

<html class="full" lang="en">
<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">

          <title><?php echo $pageTitle; ?></title>
          <link href="../css/bootstrap.min.css" rel="stylesheet">
          <link href="../css/mobileFirst.css" rel="stylesheet">
		  
		  <link rel="stylesheet" type="text/css" media="only screen and (min-width:601px)" href="../css/carousel.css">
		  <link rel="stylesheet" type="text/css" media="only screen and (min-width:601px)" href="../css/biggerScreen.css">

		    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">		  

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->		  
</head>
<body>
<div class="container">

<h1 style="color:white";>
<?php //echo "DEBUG:"; print_r($_SESSION); ?>
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
					<li class="active"><a href="#">Dashboard</a></li>
					<li><a href="../index.php">Back To Home</a></li>
					<li><a href="#">Search Events</a></li>				
					<li><a href="about.php">About</a></li>				
					<li><a href="#">Contact Us</a></li>
		<?php
			if (!isset($_SESSION['login'])) {
		?>	
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
		<?php
				}
		?>	
		<?php
			if (isset($_SESSION['login'])) {
		?>			
					<li class="dropdown">
			          <a href="#"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          <span class="glyphicon glyphicon-user"></span>&nbsp; <?php if (isset($account)) echo $account[0]['username'];?> <span class="caret"></span></a>
        			</li>
		<?php
				}
		?>	


				  </ul>
	      </div><!-- /.navbar-collapse -->
	   </div><!-- /.container-fluid -->
	</nav>
