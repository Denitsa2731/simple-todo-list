<?php 

class Dbh {
	private $sName;
	private $uName;
	private $pass;
	private $db_name;
	private $charset;
	
	public function connect(){
		$this->sName = "localhost";
		$this->uName="root";
		$this->pass="";
		$this->db_name="to_do_list";
		$this->charset="utf8mb4";
		
		try {
			$dsn = "mysql:host=".$this->sName.";db_name=".$this->db_name.";charset=".$this->charset;
			$pdo = new PDO ($dsn, $this->uName, $this->pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;
		} catch (PDOException $e) {
			echo "Connection failed:".$e->getMessage();
		}
	}
}
