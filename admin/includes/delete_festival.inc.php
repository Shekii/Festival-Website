<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../classes/event.class.php');

$event = new Event();

$festivalID = $_POST['FID'];


$event->deleteFestival($festivalID);	



?>