<?php include_once("pages/header.php"); ?>
<?php //include_once("classes/personiterate.php"); ?>

<?php 
// autoload function always call when object created...........
	 function __autoload($class_name)
	{
		include("classes/".$class_name.".php");
	}
?>

          	<h2 style="text-align: center;" Mehod chaining>Object Iterate</h2>
           <?php

          	$person = new personiterate;
			
			foreach($person as $k=>$v)
			{	echo "<pre>";
				echo $k;
				echo "=>";
				echo $v;
				echo "</pre>";
			}
			
			$person->iterateFunc();
			
		   		
			?>
        
        

<?php include_once("pages/footer.php"); ?>