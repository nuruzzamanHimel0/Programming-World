<?php include_once("pages/header.php"); ?>



          	<h2 style="text-align: center;">Prepare Statement </h2>
           <?php				
         //    // create DB connection
           $db_conn = new mysqli("localhost","root","pass","test");
            // connection validation..........
           if($db_conn->connect_errno)
            {
                echo "Connection fail";	
            }
            else{
                echo "Connected";	
            }
           //2nd Step : READ IMAGE DATA FROM DB..................
            $query = "SELECT image FROM images WHERE id=? ";
       		$stmt = $db_conn->prepare($query);
       		$stmt->bind_param("i",$id);
       		$id=1;
       		$stmt->execute();
       		$stmt->bind_result($image);
       		$stmt->fetch();
       		header("content-type: jpg");
       		echo '<img src="data:image/jpg;base64,'.base64_encode($image).' " >  ';
            
            /*
            // 1st Step : INSERT DIRECT IMAGE IN THE TABLE...............
            //query perform......
                    //store BLOB image in the DB
                   $query = "INSERT INTO images(image) VALUES(?) ";
		   $stmt = $db_conn->prepare($query);
		   $stmt->bind_param("b", $img);
                   $img = file_get_contents("images/Himel.jpg");
                   $stmt->send_long_data(0, $img);
                   $stmt->execute();
		   
                   */
            ?>
            <?php 
             

            ?>


<?php include_once("pages/footer.php"); ?>