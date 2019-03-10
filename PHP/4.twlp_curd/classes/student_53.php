<?php
    include("main_53.php");
    class student_53 extends main_53
    {
        protected $table = "db1_studnet";
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
       

        
    }
?>

