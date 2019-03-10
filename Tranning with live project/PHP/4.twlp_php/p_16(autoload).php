<?php include_once("pages/header.php"); ?>

<?php 
	function __autoload($class_name)
	{
		echo $class_name."<br>";
		include("classes/".$class_name.".php");
	}
?>
		
         
          	<h2 style="text-align: center;">Auto load </h2>
           <?php

          
		   	$php = new php;
			$c = new c;
			$j = new java;
		   	
		   		
			?>
        
        

<?php include_once("pages/footer.php"); ?>