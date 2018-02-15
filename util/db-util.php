<?php
require '../model/product.php';
class DataBaseUtil {
	public $connection;
	public function __construct($hostName ,$dbName ,$userName ,$password) {
		try {
			$this->connection = new PDO("mysql:host=".$hostName.";dbname=".$dbName, $userName, $password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) { 
			$this->connection = null;
		}
	}
	public function closeConnection(){
		$this->connection = null;
	}
	public function select($query,$bindParams){
		try {
			$statement = $this->connection->prepare($query);
			$statement->execute($bindParams);
			$resultSet = $statement->fetchAll(PDO::FETCH_CLASS,"Product");
			if($statement->rowCount()>0){
			return $resultSet;
			}else
			return null;
		}catch(PDOException $e) {
			return "fail";
		}
	}
	public function tableUpdate($query,$bindParams) {
		try {
			$statement = $this->connection->prepare($query);
			$statement->execute($bindParams);
			return $statement->rowCount();
		}catch(PDOException $e) {
			return "fail";
		}
	}
}
?>