<?php include_once("pages/header.php"); ?>
<?php //include_once("classes/personiterate.php"); ?>

<?php 
	// function __autoload($class_name)
	// {
	// 	include("classes/".$class_name.".php");
	// }
?>

          	<h2 style="text-align: center;">Array Object</h2>
           <?php				
				// for(i=0;i<10;i++)

           	 $a = array("AA","BB","CC","DD");
           	$coding = new ArrayObject($a);

           	$iterator = $coding->getIterator()
           	while($iterator->valid()) 
           	{
           		echo $iterator->current()."<br>";
           		$iterator->next();
           	}

			?>


<?php include_once("pages/footer.php"); ?>