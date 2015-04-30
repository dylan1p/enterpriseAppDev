<?php
/**
 * @author Luca
 * definition of the User DAO (database access object)
 */
class TasksDAO {
	private $dbManager;
	function TasksDAO($DBMngr) {
		$this->dbManager = $DBMngr;
	}
	public function get($id = null) {
		$sql = "SELECT COUNT(DISTINCT task_id), STDDEV(duration_mins), AVG(duration_mins)";
		$sql .= "FROM tasks";
	
		
		$stmt = $this->dbManager->prepareQuery ( $sql );
		$this->dbManager->bindValue ( $stmt, 1, $id, $this->dbManager->INT_TYPE );
		$this->dbManager->executeQuery ( $stmt );
		$rows = $this->dbManager->fetchResults ( $stmt );
		
		return ($rows);
	}

}
?>