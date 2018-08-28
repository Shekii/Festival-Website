<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../classes/ticket.class.php');
include('../classes/user.class.php');
include ('../includes/functions.inc.php');
include('../includes/sessions.inc.php');

$ticket = new Ticket();
$user = new User();

$festivalID = safeInt($_POST['festivalID']);
$userID = safeInt($_POST['festivalID']);
$quantity = safeInt($_POST['quantity']);



if (isset($_SESSION['login']) == 1) 
{
	$ticket->buyTicket($userID, $festivalID, $quantity);
} else {
      header("Location: ../login.php");
      exit();
}
?>
