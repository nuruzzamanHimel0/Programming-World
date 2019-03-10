<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">Prepare Statement </h2>
          
            <?php 
            //create DB connection...................
            $db = new mysqli("localhost","root","pass","testphp");
            //DB connection validation.......
            if(mysqli_connect_errno())
            {
                echo "DB Connection Fail.(".mysqli_connect_error().")<br>";
                exit();
            }
            else{
                echo "DB Connected.<br>";
            }
            //Query Perform.....
            $query = "SELECT username,password FROM login ORDER BY id ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            // build result......
            $stmt->bind_result($user,$pass);
            // fetch return data..........
            while($stmt->fetch())
            {
                echo $user."<br>";
            }
            //statement close
            $stmt->close();
            //close DB conneciton......
            $db->close();
            ?>


<?php include_once("pages/footer.php"); ?>