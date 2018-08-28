<?php
	ini_set('display_errors', 1);
	require('../includes/conn.inc.php');
	include('../includes/functions.inc.php');

	if(isset($_POST["username"])) 
	{
		$sUsername = safeString($_POST['username']);

		$checkSQL = "SELECT username FROM users WHERE userID = 1";
		$checkStmt = $pdo->prepare($checkSQL);


		$checkStmt->bindParam(':username', $sUsername, PDO::PARAM_STR); 

		$checkStmt->execute();

		$row = $checkStmt->fetchObject();

		$username = $row->username;	

		if ($row)
			die($username);
		else
			die("NOT ADMIN");

		//SELECT 

	}
?>