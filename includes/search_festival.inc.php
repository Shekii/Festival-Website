<?php

include('../classes/event.class.php');

$event = new Event();

$searchTerm = $_POST['searchTerm'];
$type = $_POST['type'];


if ($type == "normal")
	$found = $event->searchEvent($searchTerm);

else if ($type == "p-low")
	$found = $event->searchEventPriceLow($searchTerm);	

else if ($type == "p-high")
	$found = $event->searchEventPriceHigh($searchTerm);	

echo json_encode($found);

?>