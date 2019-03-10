<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">Prepare Statement With PDO </h2>
           <?php		
            
            //dsn - data source name
           $dsn = "mysql:dbname=testphp;host=localhost; ";
           $user = "root";
           $pass = "pass";
           //Create DB connection................
           try {
               $connec = new PDO($dsn,$user,$pass);
            } catch (PDOException $exc) {
               echo "DC fail".$exc->getMessage();
           }
           
           $id = 2;
           
           $query = "SELECT * FROM login WHERE id=? && username=? ";
           $stmt = $connec->prepare($query);
           $stmt->bindParam(1, $id);
           $stmt->bindValue(2, "sezan");
           $stmt->execute();
           while ($row = $stmt->fetch()) {
               echo "Username : ".$row["username"]."<br>";
               echo "Passworde : ".$row["password"]."<br>";
            }

            ?>


<?php include_once("pages/footer.php"); ?>