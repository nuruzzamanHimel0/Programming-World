<?php include("lib/Database.php") ?>
<?php include("helper/Formate.php") ?>
<?php 
	class Shout{
		public $db;
		public $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Formate();

		}
		public function getAllData(){
			$query = "SELECT * FROM db_box ORDER BY id DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function insertData($data)
		{

			$name = $this->fm->validation($data['name']);
			$body = $this->fm->validation($data['body']);

			$name = mysqli_real_escape_string($this->db->conn,$name);
			$body = mysqli_real_escape_string($this->db->conn,$body);
			
				//exit();
			date_default_timezone_set("Asia/Dhaka");
			$time = date("h:i:sa");

			
			$query = "INSERT INTO `db_box`(`name`, `body`, `time`) VALUES ('$name','$body','$time')";
			//exit();
			$result = $this->db->insert($query);
			if($result)
			{
				header("Location: index.php");
			}else{
				echo "Fail to Shout";
			}

		}
	}
?>