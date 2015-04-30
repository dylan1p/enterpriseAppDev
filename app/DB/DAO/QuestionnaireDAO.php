<?php
/**
 * @author Luca
 * definition of the User DAO (database access object)
 */
class QuestionnairesDAO {
	private $dbManager;
	function QuestionnairesDAO($DBMngr) {
		$this->dbManager = $DBMngr;
	}
	public function get($id = null) {
		$sql = "SELECT COUNT(*), STDDEV(MWL_total), AVG(MWL_total), STDDEV(RSME), AVG(RSME)";
		$sql .= "FROM questionnaire";
		if ($id != null)
			$sql .= " WHERE task_number=?;";
		$stmt = $this->dbManager->prepareQuery( $sql );
		$this->dbManager->bindValue ( $stmt, 1, $id, $this->dbManager->INT_TYPE );
		$this->dbManager->executeQuery ( $stmt );
		$rows = $this->dbManager->fetchResults ( $stmt );
		
		return ($rows);
	}

}
?>