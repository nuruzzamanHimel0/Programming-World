<?php
    include("config.php");
    class db {
        private static $pdo;
        private $dsn;
        public static function connection()
        {   
            if(!isset(self::$pdo))
            {   //dsn - data source name
            
                try {
                    self::$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".HOST,USER,PASS);
                   // echo "DB Connected. <br>";
                } catch (PDOException $ex) {
                    echo "DB Connction Fail".$ex->getMessage();
                }  
            }
            return self::$pdo;
        }
       
        public static function prepare($query)
        {
            return self::connection()->prepare($query); // $stmt = pdo->prepre(query)
        }
    }
?>
