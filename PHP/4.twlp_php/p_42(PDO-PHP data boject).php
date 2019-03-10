<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">PDO-PHP data object </h2>
           <?php		
           // data source name		
            $dsn = "mysql:dbname=testphp;host=localhost;";
            $user= "root";
            $pass="pass";

            try {
              $connection = new PDO($dsn,$user,$pass);
              echo "DB Connected";
            } catch (PDOException $e) {
              echo "Connection Fail...".$e->getMessage();
            }
            $query = "SELECT * FROM login";
            $result = $connection->query($query);
   
            while ($row = $result->fetch()) {
                echo $row["username"]."<br>";
}
           

           
            ?>


<?php include_once("pages/footer.php"); ?>