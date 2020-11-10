config.php:-----------------
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "your_db_name");
?>
Database Calss:------------------
<?php
Class Database{
 public $host   = DB_HOST;
 public $user   = DB_USER;
 public $pass   = DB_PASS;
 public $dbname = DB_NAME;
 
 
 public $link;
 public $error;
 
 public function __construct(){
  $this->connectDB();
 }
 
private function connectDB(){
 $this->link = new mysqli($this->host, $this->user, $this->pass, 
  $this->dbname);
  if(!$this->link)
		{
			echo "Connection Error".$this->link->connect_error;
			return false;
		}
 }
 }
 
// Select or Read data
public function select($query){
  $result = $this->link->query($query) or 
   die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }
 
// Insert data
public function insert($query){
 $insert_row = $this->link->query($query) or 
   die($this->link->error.__LINE__);
 if($insert_row && mysqli_affected_rows($this->link)==1){
   return $insert_row;
 } else {
   return false;
  }
 }
  
// Update data
 public function update($query){
 $update_row = $this->link->query($query) or 
   die($this->link->error.__LINE__);
 if($update_row && mysqli_affected_rows($this->link)==1){
  return $update_row;
 } else {
  return false;
  }
 }
  
// Delete data
 public function delete($query){
 $delete_row = $this->link->query($query) or 
   die($this->link->error.__LINE__);
 if($delete_row && mysqli_affected_rows($this->link)==1){
   return $delete_row;
 } else {
   return false;
  }
 }
 
}