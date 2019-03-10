<?php include("config/config.php");  ?>
<?php 
	class Database{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $dbname = DB_NAME;

		public $conn;
		public $error;

		public function __construct()
		{
			$this->connectionDB();
		}

		public function connectionDB()
		{
			$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
			if(!$this->conn )
			{
				echo "DB Connection fail".$this->conn->connect_error;
				return false;
			}
			// else{
			// 	echo "DB Connected";
			// }
		}

		public function select($query) 
		{
			$result = $this->conn->query($query);
			if($result->num_rows > 0)
			{
				return $result;
			}else{
				return false;
			}

		}
		public function insert($query)
		{
			$result = $this->conn->query($query);
			
				if($result )
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
		if($result && mysqli_affected_rows($this->conn) == 1)
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
		if($result && mysqli_affected_rows($this->conn) == 1)
		{
			return $result;
		}
		else{
			return false;
		}
	}
	}
?>