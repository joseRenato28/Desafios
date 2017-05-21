<?php
Class MainModel
{
	
	public $conn;

	private $db_host = '127.0.0.1';
	private $user_name = 'root';
	private $user_password = '';
	private $db_name = 'desafio3';

	public function __construct(){
		try {
			$this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->user_name, $this->user_password);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			$this->conn = null;
			echo "Falha na conexão - ".$e->getMessage();
			return;
		}	
	}
}

?>