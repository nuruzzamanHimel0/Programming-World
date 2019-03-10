<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">Prepare Statement </h2>
           <?php				
            // create DB connection
           $db_conn = new mysqli("localhost","root","pass","testphp");
            // connection validation..........
           if(mysqli_connect_error())
            {
                echo "Connection fail (".mysqli_connect_error().") <br>";	
                exit();
            }
            else{
                echo "Connection Successfull  <br>";	
            }
          
           
           $user = "Cann";
           $pass = "pass";
           $vali = 1;

           $query = "INSERT INTO login(username,password,visible) VALUES(?,?,?) ";
           $stmt = $db_conn->prepare($query);
           $stmt->bind_param("ssi",$user,$pass,$vali);
           $stmt->execute();

          $query = "SELECT username,password FROM login ORDER BY id ";
          $stmt = $db_conn->prepare($query);
          $stmt->execute();
          // build result......
          $stmt->bind_result($user,$pass);
          // fetch return data..........

          while($stmt->fetch())
          {
          echo "<br> Username : ".$user." "."Password : ".$pass."<br> <br>";
          }
           //....... select for ALL......................
            // $query = "SELECT * FROM login ORDER BY id ";
            // $result = $db_conn->query($query);
            // while ($row = $result->fetch_array())
            // {
            //     echo "<pre>";
            //     echo $row["username"];
            //      echo "</pre>";
            // }
            
            ?>


<?php include_once("pages/footer.php"); ?>