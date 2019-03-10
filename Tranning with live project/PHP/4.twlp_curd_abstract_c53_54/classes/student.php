<?php 
	include_once("Main.php");
?>
<?php 
	
	class student extends Main{
		protected $tbl = "db1_studnet";
		protected $name;
		protected $dept;
		protected $age;

		public function setname($value)
		{
			$this->name = $value;
		}
		public function setdept($value)
		{
			$this->dept = $value;
		}
		public function setage($value)
		{
			$this->age = $value;
		}

		

		public function insert()
		{
			$query = "INSERT INTO ".$this->tbl."(name, dept, age) VALUES(:name, :dept, :age)  ";
			$stmt = db:: prepare($query);
			$stmt->bindParam(":name",$this->name );
			$stmt->bindParam(":dept",$this->dept );
			$stmt->bindParam(":age",$this->age );
			return $stmt->execute();
		}


		public function readAll()
		{
			$query = "SELECT * FROM  ".$this->tbl;
			// echo $query;
			// exit();
			$stmt = db:: prepare($query);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		public function deletByid($id)
		{
			$query = "DELETE FROM ".$this->tbl. " WHERE id=:id "  ;
			$stmt = db:: prepare($query);
			$stmt->bindParam(":id",$id);
			return $stmt->execute();
		}
	}
?>