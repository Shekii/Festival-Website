<?php
ini_set('display_errors', 1);
require_once('dbconfig.php');

class Event {

/*
	Class to access and manipulate data from the festivals, venue and tickets table

*/

	private $conn;

	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

    public function getAmountEvents() 
    {
		$sql = "SELECT COUNT(festivalID) FROM festivals";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;
    }

    private function getPrice($festivalID)
    {
 		$sql = "
 				SELECT ticketPrice 
 				FROM tickets INNER JOIN festivals
 				ON tickets.ticketID = festivals.ticketID
 				WHERE festivalID = :festivalid ";


		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":festivalid", $festivalID);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;	   	
    }

    private function getTicketsLeft($festivalID)
    {
 		$sql = "
 				SELECT numTickets 
 				FROM tickets INNER JOIN festivals
 				ON tickets.ticketID = festivals.ticketID
 				WHERE festivalID = :festivalid ";


		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":festivalid", $festivalID);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;	   	
    }


	function loadFestivals()
	{
	    $sql = "SELECT * FROM festivals";
	    $stmt = $this->conn->query($sql);

	    while($row = $stmt->fetchObject()) {

	    	$festivalID = $row->festivalID;

	        echo "<tr id={$row->festivalID} value={$row->festivalID} class='T_ROW'> ";
	        echo "<td>{$row->festivalID}</td>"; 
	        echo "<td><a href=\"../details.php?festivalID={$row->festivalID}\">{$row->festivalName}</a></td>";
	        echo "<td>" . implode($this->getPrice($festivalID))  . "</td>";
	        echo "<td>" . implode($this->getTicketsLeft($festivalID))  . "</td>";
	        echo "<td class='edit' value={$row->festivalID}><a href=\"edit.php?festivalID={$row->festivalID}\">Edit</a></td>";
	        echo "<td class='delete' value={$row->festivalID}><a href=\"delete.php?festivalID={$row->festivalID}\">Delete</a></td>";
	        echo "</tr>";

	    }      
	}

    public function getEverything()
    {

		$sql = "SELECT festivals.* FROM festivals";

		$stmt = $this->conn->prepare($sql);

		$rows = $stmt->fetchAll();

		return $rows;

    }
	public function getEvents() 
	{
		$sql = "SELECT festivals.*, venue.*
				FROM festivals  
				INNER JOIN venue
				ON festivals.venueID = venue.venueID
				INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute();

		$row = $stmt->fetchAll();

		return $row;
	}

	public function getEvent()
	{
		$sql = "SELECT festivals.*, venue.*, tickets.*
				FROM festivals  
				INNER JOIN venue
				ON festivals.venueID = venue.venueID
				INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute();

		$row = $stmt->fetchAll();

		return $row;		
	}

	public function searchEvent($search)
	{
		$searchTerm = "%" . $search . "%";

		$sql = "SELECT festivalID, festivalName, tickets.ticketPrice
				FROM festivals 
				INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID
				WHERE festivalName LIKE :search";

		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":search", $searchTerm);

		$stmt->execute();

		$rows = $stmt->fetchAll();

		return $rows;			
	}

	public function searchEventPriceLow($search)
	{
		$searchTerm = "%" . $search . "%";

		$sql = "SELECT festivalID, festivalName, tickets.ticketPrice
				FROM festivals 
				INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID
				WHERE festivalName LIKE :search
				ORDER BY tickets.ticketPrice ASC";

		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":search", $searchTerm);

		$stmt->execute();

		$rows = $stmt->fetchAll();

		return $rows;			
	}

	public function searchEventPriceHigh($search)
	{
		$searchTerm = "%" . $search . "%";

		$sql = "SELECT festivalID, festivalName, tickets.ticketPrice
				FROM festivals INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID
				WHERE festivalName LIKE :search
				ORDER BY tickets.ticketPrice DESC";

		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":search", $searchTerm);

		$stmt->execute();

		$rows = $stmt->fetchAll();

		return $rows;			
	}


	public function searchEventDateSoon($search)
	{
		$searchTerm = "%" . $search . "%";

		$sql = "SELECT festivalID, festivalName, tickets.ticketPrice
				FROM festivals INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID
				WHERE festivalName LIKE :search
				ORDER BY tickets.ticketPrice DESC";

		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":search", $searchTerm);

		$stmt->execute();

		$rows = $stmt->fetchAll();

		return $rows;			
	}

	public function getFestival($festivalID)
	{
		$sql = "SELECT festivals.*, venue.*, tickets.*
				FROM festivals  
				INNER JOIN venue
				ON festivals.venueID = venue.venueID
				INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID
				WHERE festivals.festivalID = :festivalid";

		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":festivalid", $festivalID);

		$stmt->execute();

		$row = $stmt->fetchAll();

		return $row;	
	}

	public function getVenue($festivalID)
	{
		$sql = "SELECT venueLocation, venueStart, venueEnd FROM venue WHERE venueID = :festivalid";
		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":festivalid", $festivalID);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;		
	}
	public function getTicket($festivalID)
	{
		$sql = "SELECT ticketPrice, numTickets FROM tickets WHERE ticketID = :festivalid";
		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":festivalid", $festivalID);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;		
	}


	public function deleteFestival($festivalID)
	{
		$sql = "DELETE festivals, venue, tickets 
				FROM festivals
				INNER JOIN venue
				ON festivals.venueID = venue.venueID
				INNER JOIN tickets
				ON festivals.ticketID = tickets.ticketID
				WHERE festivals.festivalID = :festivalID";
		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":festivalID", $festivalID);

		$stmt->execute();		
	}

	public function editFestival(
		$festivalID,
		$name,
		$des,
		$line,
		$image,
		$loc,
		$startDate,
		$endDate,
		$price,
		$numTickets)
	{
/*
		Function to edit a festival in the administrator panel.
		Remember to match parameters to params of query.	
*/ 

		$sql = "

				UPDATE festivals
				INNER JOIN venue ON venue.venueID = festivals.venueID
				INNER JOIN tickets ON tickets.ticketID = festivals.ticketID
				SET 
					festivals.festivalName = :name,
					festivals.festivalDescription = :des,
					festivals.festivalImage = :image,
					festivals.festivalLineup = :lineUp,
					venue.venueLocation = :loc,
					venue.venueStart = :sd,
					venue.venueEnd = :ed,
					tickets.ticketPrice = :price,
					tickets.numTickets = :num

				WHERE festivals.festivalID = :id
				";


		 $stmt = $this->conn->prepare($sql);

		 $stmt->bindparam(":name", $name, PDO::PARAM_STR);
		 $stmt->bindparam(":des", $des, PDO::PARAM_STR);
		 $stmt->bindparam(":image", $image, PDO::PARAM_STR);
		 $stmt->bindparam(":lineUp", $line, PDO::PARAM_STR);
		 $stmt->bindparam(":loc", $loc, PDO::PARAM_STR);
		 $stmt->bindparam(":sd", $startDate, PDO::PARAM_STR);	 
		 $stmt->bindparam(":ed", $endDate, PDO::PARAM_STR);		
		 $stmt->bindparam(":price", $price, PDO::PARAM_STR);			 	 
		 $stmt->bindparam(":num", $numTickets, PDO::PARAM_INT);	
		 $stmt->bindparam(":id", $festivalID, PDO::PARAM_INT);


		 $stmt->execute();			
	}

	private function getDate($festivalID)
	{
		$getDateSql = "SELECT venueStart FROM venue WHERE venueID = :festivalid";
		$stmt = $this->conn->prepare($getDateSql);
		$stmt->bindparam(":festivalid", $festivalID);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);	
		
		$date = implode($row);

		return $date;	
	}

	public function getDaysLeft($festivalID)
	{
		$getDateSql = "SELECT venueStart FROM venue WHERE venueID = :festivalid";
		$stmt = $this->conn->prepare($getDateSql);
		$stmt->bindparam(":festivalid", $festivalID);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$date = $this->getDate($festivalID);

		$timeDate = strtotime($date);
		$nowDate = time();

		$daysLeft = abs($nowDate - $timeDate)/60/60/24;

		return round($daysLeft);

	}

	public function hasFestivalPast($festivalID)
	{
		$hasPast = false;

		$date = $this->getDate($festivalID);
		$timeDate = strtotime($date);
		$nowDate = time();

		if ($nowDate > $timeDate)
			$hasPast = true;

		return $hasPast;
	}
 
}
?>