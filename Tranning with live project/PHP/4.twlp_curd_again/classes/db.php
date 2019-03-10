<?php 
    include("config.php");
?>
<?php 
    class db{

        private static $pdo;
        public static function connection()
        {
            if(!isset(self::$pdo))
            {
                try {
                self::$pdo = new PDO('mysql:dbname='.DB_NAME.';host='.HOST,USER,PASS);
               // echo "DB Connected <br>";
                } catch (PDOException $e) {
                echo "DB Connection Fail.".$e->getMessage();
                }
            }
            return self::$pdo;
            
        } // connection class  end.................
        
        public static function prepare($query)
        {
            return self::connection()->prepare($query);
        }
    } // ...........db class end................. 
    

   
?>