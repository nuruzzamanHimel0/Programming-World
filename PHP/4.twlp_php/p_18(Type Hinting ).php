<?php include_once("pages/header.php"); ?>

<?php 
// autoload function always call when object created...........
	function __autoload($class_name)
	{
		include("classes/".$class_name.".php");
	}
?>

          	<h2 style="text-align: center;" Mehod chaining>Type Hinting</h2>
           <?php

          
			$obj = new typehinding;	
			$num = array(
				array('number one',10,10),
				array('number two',20,20)
			);
			$obj->getmethod($num);
			
			$obj1 = new th1();
			new th2($obj1);
		   		
			?>
        
        

<?php include_once("pages/footer.php"); ?>