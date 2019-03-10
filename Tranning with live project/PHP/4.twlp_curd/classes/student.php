<?php
    include("db.php");
    class student
    {
        private $table = "db1_studnet";
        private $name;
        private $age;
        private $dept;
        
        public function setName($value)
        {
            $this->name = $value;
        }
         public function setDept($value)
        {
            $this->dept = $value;
        }
         public function setAge($value)
        {
            $this->age = $value;
        }
        public function insert()
        {
            $query = "INSERT INTO ".$this->table."(name,dept,age) VALUES(:name,:dept,:age ) ";
           $stmt =  db::prepare($query);
           $stmt->bindParam(":name",$this->name);
           $stmt->bindParam(":dept",$this->dept);
           $stmt->bindParam(":age",$this->age);
          	return  $stmt->execute();
        }

        public function delete($id)
        {
        	$query = "DELETE FROM ".$this->table." WHERE id=:id ";
        	$stmt = db::prepare($query);
        	$stmt->bindParam(":id",$id);
        	return $stmt->execute();
        }

        public function update($id)
        {
        	$query = "UPDATE ".$this->table." SET name=:name,dept=:dept,age=:age WHERE id=:id ";
        	$stmt = db::prepare($query);
        	$stmt->bindParam(":name",$this->name);
        	$stmt->bindParam(":dept",$this->dept);
        	$stmt->bindParam(":age",$this->age);
        	$stmt->bindParam(":id",$id);
        	return $stmt->execute();
        	//echo $query;
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

