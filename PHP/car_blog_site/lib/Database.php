
<?php 
	
	class Database{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $name = DB_NAME;

		public $conn;
		public $error;

		public function __construct()
		{
			$this->connection();
		}

		public function connection()
		{
			$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->name);
			if(!$this->conn)
			{
				echo "DB Connection Fail".$this->conn->connect_error;
			// }else{
			// 	echo "DB Connected";
			// }
			}
		}

		public function select($query)
		{
			$result = $this->conn->query($query);
			 //$row = mysqli_num_rows($result);
			if($result->num_rows >0)
			{
				return $result;
			}
			else{
				return false;
			}
		}
		public function insert($query)
		{
			$result = $this->conn->query($query);
			
			if($result)
			{
				return $result;
			}
			else{
				return false;
			}
		}

		public function update($query)
		{
			$result = $this->conn->query($query);
			
			if($result)
			{
				return $result;
			}
			else{
				return false;
			}
		}
		public function delete($query)
		{
			$result = $this->conn->query($query);
			
			if($result && mysqli_affected_rows( $this->conn) == 1)
			{
				return $result;
			}
			else{
				return false;
			}
		}
	}
?>