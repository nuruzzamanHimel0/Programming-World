<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">Mysqli Connect OOP </h2>
           <?php				
		
           $mysqli = new mysqli("localhost","root","pass","testphp");
//           connection validation..........
           if($mysqli->connect_errno)
            {
                echo "Connection fail".$mysqli->connect_error."(".$mysqli->connect_errno.")";	
            }
            else{
                echo "Connected";	
            }
//            Query perform............
            $query = "SELECT * FROM login";
            $result = $mysqli->query($query);
//            use return data..............
            while ($row = $result->fetch_array())
            {
                echo "<pre>";
                echo $row["username"];
                 echo "</pre>";
            }
            /* free result set */
            $result->free();
            
            /* close connection */
            $mysqli->close();
            ?>


<?php include_once("pages/footer.php"); ?>