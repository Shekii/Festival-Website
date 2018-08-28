<?php

	ini_set('display_errors', 1);
	include('sessions.inc.php');
	include('../includes/user.class.php');
	require('conn.inc.php');

	$sUsername = $_POST['username'];
	$sPassword = $_POST['password'];

	$user = new User();

	if ($user->doLogin($sUsername, $sPassword))
	{
	 	$_SESSION['login'] = 1; //logged in
	 	$_SESSION['userID'] = $user->getUserID();
	 	header("Location: ../index.php");	
	} else
	 {
		header("Location: ../login.php");		
	 	die(header("location:../login.php?loginFailed=true&reason=password&error=true"));
	}


?>