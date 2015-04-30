<?php
require_once "DB/pdoDbManager.php";
require_once "DB/DAO/StudentDAO.php";
require_once "Validation.php";
class StudentModel {
	private $StudentsDAO; // list of DAOs used by this model
	private $dbmanager; // dbmanager
	public $apiResponse; // api response
	private $validationSuite; // contains functions for validating inputs
	public function __construct() {
		$this->dbmanager = new pdoDbManager ();
		$this->StudentsDAO = new StudentsDAO ( $this->dbmanager );
		$this->dbmanager->openConnection ();
		$this->validationSuite = new Validation ();
	}
	public function getStudents() {
		$student = $this->StudentsDAO->get ();
		return($student);
	}
	public function searchNationality($string) {
		if (!empty ( $string )) {
			$resultSet = $this->StudentsDAO->search ( $string );
			
			return $resultSet;
		}
		
		return false;
	}
	
	public function __destruct() {
		$this->StudentsDAO = null;
		$this->dbmanager->closeConnection ();
	}
}
?>