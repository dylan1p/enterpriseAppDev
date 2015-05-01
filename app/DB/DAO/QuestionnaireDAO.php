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
		$sql = "SELECT COUNT(*) as No_Questionnaires, STDDEV(MWL_total) as Deviation_MWL, AVG(MWL_total)
		as Average_MWL, STDDEV(RSME) as Deviation_RSME, AVG(RSME) as Average_RSME ";
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