<?php 
	include("config.php");

	class database{
		
		public $pdo;

		public  function __construct()
		{
			if(!isset($this->pdo))
			{
				try {
					$this->pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USER,DB_PASS);
					//echo "DB Connected";
				} catch (PDOException $e) {
					echo "DB Connection Fail...".$e->getMessage();
				}
			}
			 
		} // __construct end......

	}
?>