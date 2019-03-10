<?php 
	include_once("session.php");
	include_once("database.php");

	class user{
		
		private $db;
		public function __construct()
		{
			$this->db = new database();
		}
		public function updateUserData($id,$data)
		{
			$userId = $id;
			$name = $data['name'];
			$username = $data['username'];
			$email = $data['email'];
			
			//$updt_email = $this->updtEmail($userId,$email);

			if(empty($name) || empty($username) || empty($email))
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Field Can't Empty </strong> </div>";
				return $messg;
			}

			if(strlen($name)<5)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Name is too Short </strong> </div>";
				return $messg;
			}
			if(strlen($username)<5)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Username is too Short </strong> </div>";
				return $messg;
			}
			elseif(preg_match('/[^a-z0-9_-}]+/i', $username))
			{
					$messg = "<div class=\"alert alert-danger\"><strong>Error ! Username must only contain alphanumerical, dashes and underscore</strong> </div>";
				return $messg;
			}
			// if($updt_email == FALSE)
			// {
			// 	$messg = "<div class=\"alert alert-danger\"><strong>Error ! This Email Already Used By Someone</strong> </div>";
			// 	return $messg;
			// }

			if(filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error !The Email Address is not validate </strong> </div>";
				return $messg;
			}
			if(empty($messg))
			{
				$query = "UPDATE table_user SET 
				name=:name,
				username=:username,
				email = :email 
				WHERE id = :id ";

				$stmt = $this->db->pdo->prepare($query);
				$stmt->bindParam(":name",$name);
				$stmt->bindParam(":username",$username);
				$stmt->bindParam(":email",$email);
				$stmt->bindParam(":id",$userId);
				$result = $stmt->execute();

				if(isset($result))
				{
					$messg = "<div class=\"alert alert-success\"><strong>Success !Update successfully </strong> </div>";
				return $messg;
				}else{
					$messg = "<div class=\"alert alert-danger\"><strong>Error ! Update Fail. </strong> </div>";
				return $messg;
				}
			}

			
		}

		
		public function userLogin($data)
		{
			$messg = "";
			$email = $data['email'];
			$password = $data['password'];
			$chk_email = $this->checkEmail($email);
			if(strlen($password)<3)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Password length is too short </strong> </div>";
				return $messg;
			}
			else{
				$password = md5($password);
			}

			if(empty($email) || empty($password))
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Field Can't Empty </strong> </div>";
				return $messg;
			}
			if($chk_email == FALSE)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error !Your Email address is not available !! </strong> </div>";
				return $messg;
			}

			if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error !The Email Address is not validate </strong> </div>";
				return $messg;
			}

			$result = $this->getLoginUser($email,$password);
			if($result)
			{
				session::sess_start();
				session::sess_set("login",true);
				session::sess_set("id",$result->id);
				session::sess_set("name",$result->name);
				session::sess_set("username",$result->username);
				session::sess_set("email",$result->email);
				session::sess_set("loginmsg","<div class=\"alert alert-success\"><strong>Success ! Login Successful </strong> </div>");
				session::redirect("index.php");
			}
			else{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Login Fail </strong> </div>";
				return $messg;
			}
		}

		public function getLoginUser($email,$password)
		{
			$query = "SELECT * FROM table_user WHERE email=:email && password=:password  LIMIT 1";
			$stmt = $this->db->pdo->prepare($query);
			$stmt->bindParam(":email",$email);
			$stmt->bindParam(":password",$password);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		public function userRegistration($data)
		{	
		    $messg = "";
			$name = $data['name'];
			$username = $data['username'];
			$email = $data['email'];

			$chk_email = $this->checkEmail($email);

			$password =  $data['password'];
			if(strlen($password) < 5)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Password length is too short </strong> </div>";
				return $messg;
			}
			else
			{
				$password = md5($password);
			}

			if(empty($name) || empty($username) || empty($email) || empty($password))
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Field Can't Empty </strong> </div>";
				return $messg;
			}

			if(strlen($username) < 3)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Username is too short </strong> </div>";
				return $messg;
			}
			elseif(preg_match('/[^a-z0-9_-}]+/i', $username))
			{
					$messg = "<div class=\"alert alert-danger\"><strong>Error ! Username must only contain alphanumerical, dashes and underscore</strong> </div>";
				return $messg;
			}

			if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error !The Email Address is not validate </strong> </div>";
				return $messg;
			}
			if($chk_email == TRUE)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error !The Email Address already Exists </strong> </div>";
				return $messg;
			}

			if(empty($messg))
			{
				$query = "INSERT INTO table_user(name,username,email,password) VALUES(:name,:username,:email,:password)";
				$stmt = $this->db->pdo->prepare($query);
				$stmt->bindParam(":name",$name);
				$stmt->bindParam(":username",$username);
				$stmt->bindParam(":email",$email);
				$stmt->bindParam(":password",$password);
				$result = $stmt->execute();

				if(isset($result))
				{
					$messg = "<div class=\"alert alert-success\"><strong>Success !Thank you, You have been Registared </strong> </div>";
				return $messg;
				}else{
					$messg = "<div class=\"alert alert-danger\"><strong>Error !Registration Fail. Plz contuct again. </strong> </div>";
				return $messg;
				}
			}

		} // userRegistration method end........

		public function checkEmail($email)
		{
			$query = "SELECT * FROM table_user WHERE email = :email ";
			$stmt = $this->db->pdo->prepare($query);
			$stmt->bindParam(":email",$email);
			$stmt->execute();

			if($stmt->rowCount()>0)
			{
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public function getUserAllData()
		{
			$query = "SELECT * FROM table_user ORDER BY id DESC";
				$stmt = $this->db->pdo->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				return $result;
		}

		public function getUserById($id)
		{
			$query = "SELECT * FROM table_user WHERE id=:id ";
			$stmt = $this->db->pdo->prepare($query);
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		public function updateUserPass($userId,$data)
		{
			$id = $userId;
			$oldpass = $data['old_pass'];
			$newpass = $data['new_pass'];

			$chek_pass = $this->checkPassword($userId,$oldpass);

			if(empty($oldpass) OR empty($newpass))
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error !Field Can't Empty. </strong> </div>";
				return $messg;
			}
			if(strlen($newpass) <4)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! New Passwordd Is Too Short. </strong> </div>";
				return $messg;
			}
			else{
				$newpass = md5($newpass);
			}
			if($chek_pass == FALSE)
			{
				$messg = "<div class=\"alert alert-danger\"><strong>Error ! Old Password not exists. </strong> </div>";
				return $messg;
			}
			
			if(empty($messg))
			{
				
				$query = "UPDATE table_user SET password=:password WHERE id=:id ";

				$stmt = $this->db->pdo->prepare($query);

				$stmt->bindParam(":password",$newpass );
				$stmt->bindParam(":id",$id );
				$result = $stmt->execute();

				if(isset($result))
				{
					$messg = "<div class=\"alert alert-success\"><strong>Success ! Password Updated </strong> </div>";
				return $messg;
				}else{
					$messg = "<div class=\"alert alert-danger\"><strong>Error ! Password Updated Fail </strong> </div>";
				return $messg;
				}
			}
			
		}

		// HALPER OF updateUserPass() method...............
		private function checkPassword($userId,$oldpass)
		{
			$password = md5($oldpass);
			$id = $userId;

			$query = "SELECT password FROM table_user WHERE id=:id AND password=:password  ";
			$stmt = $this->db->pdo->prepare($query);
			$stmt->bindParam(":id",$id);
			$stmt->bindParam(":password",$password);
			$stmt->execute();

			if($stmt->rowCount() > 0)
			{
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

	 } //user class end............
?>