<?php
require_once "DB/pdoDbManager.php";
require_once "DB/DAO/QuestionnaireDAO.php";
require_once "Validation.php";
class QuestionnaireModel {
	private $QuestionnaireDAO; // list of DAOs used by this model
	private $dbmanager; // dbmanager
	public $apiResponse; // api response
	private $validationSuite; // contains functions for validating inputs
	public function __construct() {
		$this->dbmanager = new pdoDbManager ();
		$this->QuestionnairesDAO = new QuestionnairesDAO ( $this->dbmanager );
		$this->dbmanager->openConnection ();
		$this->validationSuite = new Validation ();
	}
	public function getQuestionnaires() {
		$Questionnaire = $this->QuestionnairesDAO->get ();
		return($Questionnaire);
	}
	public function getQuestionnaire($taskID) {
		echo $taskID;
		if (is_numeric ( $taskID ))
			return ($this->QuestionnairesDAO->get ( $taskID ));
		
		return false;
	}

	
	public function __destruct() {
		$this->TasksDAO = null;
		$this->dbmanager->closeConnection ();
	}
}
?>