<?php include_once("pages/header.php"); ?>

		
         
          	<h2 style="text-align: center;">Class And Method Exists </h2>
           <?php

          
		   // 		class student{
		   // 			public function describe()
		   // 			{
		   // 				echo "Method Exists <br>";
		   // 			}

		   // 		}
		   // 		if(class_exists("student"))
		   // 		{	
					
		   // 			echo "Student Class Exists <br>";
					// $obj = new student();
					// if(method_exists($obj,'describe'))
					// {
					// 	$obj->describe();
					// }
					// else{
					// 	echo "Method Not Exists";	
					// }
			   		
			   		
		   // 		}
		   // 		else{
		   // 			echo "Class not exists";
		   // 		}
		   		
			?>
        <?php 
        	class student{
        		public function description()
        		{
        			echo "<b> Method Exists </b><br>";
        		}
        	}

        	if(class_exists("student"))
        	{
        		echo "Student Class Exists <br>";
        		$stdObj = new student();
        		if(method_exists($stdObj,"description"))
        		{
        			$stdObj->description();
        		}
        		else{
        			echo "Method not exists";
        		}
        	}
        	else{
        		echo "Class not exists";
        	}
        ?>
        

<?php include_once("pages/footer.php"); ?>