<?php

ini_set('display_errors', 1);
require_once('dbconfig.php');


class Ticket
{

	private $conn;

	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

    private function getNumTickets($ticketid)
    {
    	$sql = "
 				SELECT numTickets 
 				FROM tickets 
 				WHERE ticketID = :ticketid ";


		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":ticketid", $ticketid);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;	   	   	
    }

    private function deductTickets($ticketid, $quantity)
    {

    		$numTickets = implode($this->getNumTickets($ticketid));

    		$newTickets = $numTickets - $quantity;

			try
			{

				$updateSql = "UPDATE tickets
							  SET tickets.numTickets = :newAmount 
							  WHERE tickets.ticketID = :ticketid";

				$stmt = $this->conn->prepare($updateSql);

				$stmt->bindParam(':newAmount', $newTickets, PDO::PARAM_INT); 
				$stmt->bindParam(':ticketid', $festivalID, PDO::PARAM_INT); 								  
					
				if ($stmt->execute())
					return true;


				return $stmt;	
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}    	
    }


    public function buyTicket($userID, $festivalID, $quantity)
    {
			try
			{

				$saleSql = "INSERT INTO sales VALUES(DEFAULT, :quantity, :ticketid, :userid)";
				$stmt = $this->conn->prepare($saleSql);

				$stmt->bindParam(':userid', $userID, PDO::PARAM_INT); 
				$stmt->bindParam(':ticketid', $festivalID, PDO::PARAM_INT); 
				$stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT); 										  
					
				if ($stmt->execute()) 
				{
					return true;
				}

			$this->deductTickets($festivalID, $quantity);	

				
				return $stmt;	
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
    }


}

?>