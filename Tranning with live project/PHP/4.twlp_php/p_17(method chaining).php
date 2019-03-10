<?php include_once("pages/header.php"); ?>

<?php 
// autoload function always call when object created...........
	function __autoload($class_name)
	{
		include("classes/".$class_name.".php");
	}
?>

          	<h2 style="text-align: center;" Mehod chaining>Method Chaining </h2>
           <?php

          
			$obj = new chain;	
			//$obj->framework()->CMS();
			
			echo $obj->getmethod(10,6)->calculat();
		   		
			?>
        
        

<?php include_once("pages/footer.php"); ?>