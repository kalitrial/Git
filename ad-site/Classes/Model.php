<?php

abstract class Model{

	protected $conn,$query;

	public function __construct(){

		$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
	}

	//prepare sql query
	public function prepareQuery($query){

		$this->query = $this->conn->prepare($query);
	}

	//function to execute prepared Query
	public function executeQuery(){
		$this->query->execute();
	}

	//function to fetch data from the database
	public function resultSet(){
		$this->executeQuery();

		return $this->query->fetchAll(PDO::FETCH_ASSOC);
	}

	//function to fetch single data from the database
	public function Single(){
		$this->executeQuery();

		return $this->query->fetch(PDO::FETCH_ASSOC);
	}

	//function to check if entry was successful into the database
	public function lastInsertedId(){
		return $this->conn->lastInsertId();
	}

}