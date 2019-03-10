<?php 
	include_once("config.php");
?>

<?php 
	class db{

		private static $pdo;
		public static function connection()
		{
			if(!isset(self::$pdo))
				{
					try {
						self::$pdo = new PDO("mysql:dbname=".DB_NAME."; host=".DB_HOST,DB_USER,DB_PASS);
						echo "DB CONNECTED";
					} catch (PDOException $e) {
						echo "DB Connection Fail...".$e->getMessage();
					}
				}
			return self::$pdo;
		}

		public static function prepare($query)
		{
			$stmt = self::connection()->prepare($query);
			return $stmt;
		}

		public static function insertImage($table_name,$filename)
		{
			$query = "INSERT INTO ".$table_name."(image) VALUES(:filename) ";
			// echo $query;
			// exit();
			$stmt = self::prepare($query);
			$stmt->bindParam(":filename",$filename);
			$result = $stmt->execute();

			if(isset($result))
			{
				$messg = "<div class='success'> Image Inserted Successfully....</div>";
				return $messg;
			}
			else{
				$messg = "<div class='error'> Image Inserted Fail....</div>";
				return $messg;
			}
		}

		public static function showImg($table_name)
		{
			$query = "SELECT * FROM ".$table_name." ORDER BY id DESC LIMIT 1  ";
			// echo $query;
			// exit();
			$stmt = self::prepare($query);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		public static function showAllimg($table_name)
		{
			$query = "SELECT * FROM ".$table_name." ORDER BY id DESC ";
			// echo $query;
			// exit();
			$stmt = self::prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		}
		public static function deletImgById($id,$table_name)
		{
			$query = "DELETE FROM  ".$table_name." WHERE id=:id ";
			// echo $query;
			// exit();
			$stmt = self::prepare($query);
			$stmt->bindParam(":id",$id);
			$result = $stmt->execute();
			if(isset($result))
			{
				$messg = "<div class='success'> Image Deleted Successfully....</div>";
				return $messg;
			}
			else{
				$messg = "<div class='error'> Image Deleted Fail....</div>";
				return $messg;
			}
		}

		public static function selectImgByid($id,$table_name)
		{
			$query = "SELECT * FROM ".$table_name." WHERE id=:id ";
			// echo $query;
			// exit();
			$stmt = self::prepare($query);
			$stmt->bindParam(":id",$id);
			 $stmt->execute();
			 $result = $stmt->fetch(PDO::FETCH_OBJ);
			 return $result;

		}
	}
?>