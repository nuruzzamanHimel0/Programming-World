<?php 
	include("classes/db.php");

	class Model 
	{
		private $table = "db1_studnet";
		public function getStudentData()
		{
			$query = "SELECT * FROM ".$this->table;
			$stmt = db::prepare($query);
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
?>