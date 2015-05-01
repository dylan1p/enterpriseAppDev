<?php
/**
 * @author Luca
 * definition of the User DAO (database access object)
 */
class StudentsDAO {
	private $dbManager;
	function StudentsDAO($DBMngr) {
		$this->dbManager = $DBMngr;
	}
	public function get($id = null) {
		$sql = "SELECT STDDEV(age) AS Standard_Deviation, AVG(age) AS Average ";
		$sql .= "FROM students";
	
		
		$stmt = $this->dbManager->prepareQuery ( $sql );
		$this->dbManager->bindValue ( $stmt, 1, $id, $this->dbManager->INT_TYPE );
		$this->dbManager->executeQuery ( $stmt );
		$rows = $this->dbManager->fetchResults ( $stmt );
		
		return ($rows);
	}
	public function search($str) {
	
		$sql = "SELECT AVG(age) AS Average, STDDEV(age) AS Standard_Deviation ";
		$sql .= "FROM students INNER JOIN nationalities ON students.id_nationality= nationalities.id ";
		$sql .= "AND nationalities.description=";
		$sql .= "'";
		$sql .= $str;
		$sql .= "';";
	
		
		$stmt = $this->dbManager->prepareQuery ( $sql );
		$this->dbManager->bindValue ( $stmt, 1, $str, $this->dbManager->STRING_TYPE );
		$this->dbManager->bindValue ( $stmt, 2, $str, $this->dbManager->STRING_TYPE );
		
		$this->dbManager->executeQuery ( $stmt );
		$rows = $this->dbManager->fetchResults ( $stmt );
		
		return ($rows);
	}	
}
?>
