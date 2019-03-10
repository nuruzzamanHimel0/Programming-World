<?php include_once("pages/header.php"); ?>

		
         
          	<h2 style="text-align: center;">Magic Method </h2>
           <?php

           // __get(undefine $property)
           // __set(undefine $property, $undefine $value)
           //__call(undefine $method, $array)
		   	
		   		class student{
		   			public function describe()
		   			{
		   				echo "I am a student <br>";
		   			}

		   			public function __get($property)
		   			{
		   				echo  $property." porperty Don't Exist <br>";
		   			}

		   				public function __set($pn,$value)
		   			{
		   				echo $pn."=".$value." not set <br>";
		   			}
		   			public function __call($mn,$a)
		   			{
		   				echo $mn." method name not exists and argument are".implode(",",$a);
		   			}
		   		}
		   		$obj = new student();
		   		$obj->describe();
		   		 $obj->name;
		   		 $obj->age="20";
		   		 $obj->noExistingMethod(1,2,3,4);
			?>
        
        

<?php include_once("pages/footer.php"); ?>