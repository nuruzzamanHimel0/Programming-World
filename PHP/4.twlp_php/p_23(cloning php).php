<?php include_once("pages/header.php"); ?>
<?php //include_once("classes/personiterate.php"); ?>

<?php 
	function __autoload($class_name)
	{
		include("classes/".$class_name.".php");
	}
?>

          	<h2 style="text-align: center;">Cloning PHP</h2>
           <?php				
				

           		$java = new cloning();
           		$java->setCat("OOP"); // variable $a
           		$java->setFw("Spring"); // variable $b

           		$php =clone $java;
           		$php->setFw("Cordinator");

           		echo "Java :".$java->getCat()."<br>";
           		echo "Java :".$java->getFw()."<br>";

           		echo "php :".$php->getCat()."<br>";
           		echo "php :".$php->getFw()."<br>";
			?>


<?php include_once("pages/footer.php"); ?>