<?php include_once("pages/header.php"); ?>


<?php 
	/*function __autoload($class_name)
	{
		include("classes/".$class_name.".php");
	}*/
	spl_autoload_register(function($class_name){
		include("classes/".$class_name.".php");
		});
?>

          	<h2 style="text-align: center;">PHP Object Serialize</h2>
           <?php				
			  // firstly it create an object in programming class then accourding to serialize function object instance will be serialize and this serialize string will be save in programming.txt file using file_put_content();     
             $obj = new programming();
			 $ser = serialize($obj);
			 echo $ser;
			 file_put_contents("file/programming.txt",$ser);
			 //after save string in the text file, string will be get using file_get_content then it would be unserialize then it will print as a string
			 $fget = file_get_contents("file/programming.txt");
			$unser = unserialize($fget);
			echo "<pre>";
			print_r($unser);
			
			 ?>


<?php include_once("pages/footer.php"); ?>