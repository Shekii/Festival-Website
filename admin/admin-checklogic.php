<?php

	ini_set('display_errors', 1);
	include('../includes/sessions.inc.php');
	include('../includes/functions.inc.php');
	require('../includes/conn.inc.php');
	require('../classes/user.class.php');

	$user = new User();

	$sUsername = safeString($_POST['username']);
	$sPassword = safeString($_POST['password']);


	$salt = sha1(md5($sPassword)); //SHA1 and MD5 salted together 
	$encryptedPass = md5($sPassword.$salt);


	$checkSQL = "SELECT userID FROM users WHERE username = :username AND password = :password AND userID = 1";
	$checkStmt = $pdo->prepare($checkSQL);


	$checkStmt->bindParam(':username', $sUsername, PDO::PARAM_STR); 
	$checkStmt->bindParam(':password', $encryptedPass, PDO::PARAM_STR); 

	$checkStmt->execute();
	$row = $checkStmt->fetch(PDO::FETCH_ASSOC);

	if ($row) {
		$_SESSION['admin'] = 1; //logged in
		$_SESSION['userID'] = $row;
		header("Location: index.php");
	} else {
		header("Location: ../login.php");		
		die(header("location:login.php?loginFailed=true&reason=password&error=true"));
	}




?>