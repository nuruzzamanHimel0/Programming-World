<?php include_once("db.php"); ?>
<?php 
	
	abstract class Main{

		protected $tbl;
		protected $name;
		protected $dept;
		protected $age;
		
		abstract public function insert();
		abstract public function readAll();
		abstract public function deletByid($id);

		public function readById($id)
		{
			$query = "SELECT * FROM ".$this->tbl." WHERE id=:id ";
			$stmt = db:: prepare($query);
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function updateById($id)
		{
			$query = "UPDATE ".$this->tbl." SET name=:name,dept=:dept,age=:age WHERE id=:id  "  ;
			$stmt = db:: prepare($query);
			$stmt->bindParam(":name",$this->name );
			$stmt->bindParam(":dept",$this->dept );
			$stmt->bindParam(":age",$this->age );
			$stmt->bindParam(":id",$id );
			return $stmt->execute();
		}
	}

?>