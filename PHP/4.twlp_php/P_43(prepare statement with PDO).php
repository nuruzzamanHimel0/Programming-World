<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">Prepare Statement With PDO </h2>
            <?php 
            //dsn- data source name
             
            ?>
            <?php 
                // $dsn = "mysql:dbname=testphp;host=localhost; ";
                // $user = "root";
                // $pass = "pass";

                // try {
                //     $conn = new PDO($dsn, $user, $pass);
                //     echo "DB Connected. <br>";
                // } catch (PDOException $e) {
                //     echo "DB Connction Fail...".$e->getMessage();
                // }

                // $user = "Cadni";
                // $pass = "pass";
                // $visible = 1;

                // $query = "INSERT INTO login(username,password,visible) VALUES(:user, :pass, :visible)";
                // $stmt = $conn->prepare($query);
                // $stmt->bindParam(":user", $user);
                // $stmt->bindParam(":pass", $pass);
                // $stmt->bindParam(":visible", $visible);
                // $stmt->execute();

                // $id = 39;
                // $query = "SELECT username,password FROM login WHERE id= :id";
                // $stmt = $conn->prepare($query);
                // $stmt->bindParam(":id",$id);
                // $stmt->execute();
                
                // while ($row = $stmt->fetch()) {
                //     echo $row["username"]."<br>";
                // }


            ?>
           <?php		
            //Create DB connection................
            //dsn - data source name
//             $dsn = "mysql:dbname=testphp;host=localhost;";
//             $user= "root";
//             $pass = "pass";
            
//             try {
//                 $conn = new PDO($dsn,$user,$pass);
//                 echo "Database Connected";
//             } catch (PDOException $e) {
//                  echo "Database Connection Fail ....".$e->getMessage();    
//             }
            
//             $username = "Tania";
//             $password  = "pass";
//             $visible = 0;
            
//             $query = "INSERT INTO login(username,password,visible) VALUES(?,?,?) ";
//             $stmt = $conn->prepare($query);
//             $stmt->bindParam(1, $username);
//             $stmt->bindParam(2, $password);
//             $stmt->bindParam(3, $visible);
//             $stmt->execute();
            
//              $query = "SELECT username,password FROM login";
//             $stmt= $conn->prepare($query);
//             $stmt->execute();
           
//             while ($row = $stmt->fetch()) {
//                 echo $row["username"]."<br>";
// }

            ?>


<?php include_once("pages/footer.php"); ?>