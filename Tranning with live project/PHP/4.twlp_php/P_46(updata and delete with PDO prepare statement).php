<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">Update and Delete with PDO- prepare statement </h2>
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
          ?>
          <?php
          // update database.................
           $id = 3;
           $user = "runa";
           // index base (?)
          /* $query = "UPDATE login SET username=? WHERE id=? ";
           $stmt = $connec->prepare($query);
           $stmt->bindParam(1, $user);
           $stmt->bindParam(2, $id);  
           $stmt->execute();
           */
           // Placeholder base (?)
//           $query = "UPDATE login SET username=:username WHERE id=:id ";
//           $stmt = $connec->prepare($query);
//           $stmt->bindParam(":username", $user);
//           $stmt->bindParam(":id", $id);  
//           $stmt->execute();
           
            ?>
                <?php 
                //DELETE DB...................
                 $id = 31;
                $query = "DELETE FROM login WHERE id=:id";
                $stmt= $connec->prepare($query);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                ?>


<?php include_once("pages/footer.php"); ?>