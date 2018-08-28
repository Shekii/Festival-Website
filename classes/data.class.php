<?php

class Data
{

	private $dsn = "";
	private $user = "";
	private $password = ""; 

	public $pdo;

	function __construct() {

		$this->$dns = "";
		$this->$user = "";
		$this->$password = "";

		try { 
			$this->$pdo = new PDO($this->$dns, $this->$dsn, $this->$password); 
			$this->$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			$this->$pdo ->exec("SET CHARACTER SET utf8");
		}
		catch (PDOException $e) { 
		echo 'Connection failed again: ' . $e->getMessage();
		}
	}

}
?>