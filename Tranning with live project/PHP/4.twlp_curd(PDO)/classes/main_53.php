<?php 
	  include("db.php");

	abstract class main_53
	{
		protected $table;

		abstract public function insert();
		abstract public function update($id);
		
		 public function delete($id)
        {
        	$query = "DELETE FROM ".$this->table." WHERE id=:id ";
        	$stmt = db::prepare($query);
        	$stmt->bindParam(":id",$id);
        	return $stmt->execute();
        }

        public function readById($id)
        {
        	$query = "SELECT * FROM ".$this->table." WHERE id=:id ";
        	$stmt = db::prepare($query);
        	$stmt->bindParam(":id",$id);
        	$stmt->execute();
        	return $stmt->fetch();
        	//echo $query;
        }
		public function readAll()
        {
            $query = "SELECT * FROM ".$this->table;
            $stmt = db::prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
	}
?>