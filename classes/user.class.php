<?php
ini_set('display_errors', 1);

require_once('dbconfig.php');


class User {

	/*
		Class for accessing and manipulating data from the users & sales tables.
		Is used for authorisation and registration.
	*/

	private $conn;

	private $userID = 0;

	//private functions

	private function encryptPass($pass)
	{
		$encryptedPass = "";

		$salt = sha1(md5($pass)); //SHA1 and MD5 salted together 
		$encryptedPass = md5($pass.$salt);	
		

		return $encryptedPass;	
	}

	//end

	//public functions


	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
		$this->userID = 0;
    }

    public function getUserID()
    {
    	return $this->userID;
    }

	public function is_loggedin()
	{
		if(isset($_SESSION['login']))
			return true;
	}

	public function is_admin() 
	{
		if (isset($_SESSION['admin']) == 1)
			return true;
	}
	public function is_user_admin($userID) 
	{
		$isAdmin = false;

		$checkSQL = "SELECT is_admin FROM users WHERE userID = :userid AND is_admin = 1";
		$checkStmt = $this->conn->prepare($checkSQL);

		$checkStmt->bindParam(':userid', $userID, PDO::PARAM_STR); 

		$checkStmt->execute();
		$row = $checkStmt->fetch(PDO::FETCH_ASSOC);

		if ($row)
			$isAdmin = true;

		return $isAdmin;
	}

		public function doLogin($uname,$upass)
		{
			$access = false;

			$sUsername = safeString($uname);
			$sPassword = safeString($upass);

			$encryptedPass = $this->encryptPass($sPassword);

			try
			{
				$checkSQL = "SELECT userID FROM users WHERE username = :username AND password = :password ";
				$stmt = $this->conn->prepare($checkSQL);

				$stmt->bindParam(':username', $sUsername, PDO::PARAM_STR); 
				$stmt->bindParam(':password', $encryptedPass, PDO::PARAM_STR); 

				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($row) 
				{
					$this->userID = $row;
					$access = true;
					
				}

			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}

			return $access;
		}

		public function register($uname,$upass, $email, $first, $last)
		{
			$encryptedPassword = $this->encryptPass($upass);
			try
			{

				$registerSQL = "INSERT INTO users VALUES(DEFAULT, :username, :password, :email, :firstname, :surname, 0)";
				$RegiseterStmt = $this->conn->prepare($registerSQL);

				$RegiseterStmt->bindParam(':username', $uname, PDO::PARAM_STR); 
				$RegiseterStmt->bindParam(':password', $encryptedPassword, PDO::PARAM_STR); 
				$RegiseterStmt->bindParam(':email', $email, PDO::PARAM_STR); 
				$RegiseterStmt->bindParam(':firstname', $first, PDO::PARAM_STR); 
				$RegiseterStmt->bindParam(':surname', $last, PDO::PARAM_STR); 											  
					
				if ($RegiseterStmt->execute())
					return true;

				
				return $stmt;	
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}				
		}
	


	public function is_username_free($username) 
	{
		$isUnique = true;

		$checkSQL = "SELECT username FROM users WHERE username = :username";
		$checkStmt = $this->conn->prepare($checkSQL);

		$checkStmt->bindParam(':username', $username, PDO::PARAM_STR); 

		$checkStmt->execute();
		$row = $checkStmt->fetch(PDO::FETCH_ASSOC);

		if ($row)
			$isUnique = false;

		return $isUnique;
	}


	public function getUsernameByID($userID)
	{
		$sql = "SELECT username FROM users WHERE userID = :userid";
		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":userid", $userID);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;
	}

	public function getUser($userID) 
	{
		/*
			Function to return an array of the user table, access via ['']
		*/
		$sql = "SELECT * FROM users WHERE userID = :userid";
		$stmt = $this->conn->prepare($sql);

		$stmt->bindparam(":userid", $userID);

		$stmt->execute();

		$row = $stmt->fetchAll();

		return $row;
	}
 
}
?>