<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('conn.inc.php');
include('functions.inc.php');
include('sessions.inc.php');
include('../classes/user.class.php');

$user = new User();


$sUsername = safeString($_POST['username']);
$sPassword = safeString($_POST['password']);
$sEmailAddress = safeString($_POST['email']);
$sFirstName = safeString($_POST['firstName']);
$sSurname = safeString($_POST['surname']);


	if (! $user->is_username_free($sUsername)) 	//if the username has already been found
		die(header("location:../register.php?registerFailed=true&reason=username&error=true"));

	if ($user->register($sUsername, $sPassword, $sEmailAddress, $sFirstName, $sSurname))
		die(header("location:../index.php")); 

	
	else
		echo "FAIL";

	 


