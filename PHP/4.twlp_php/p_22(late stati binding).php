<?php include_once("pages/header.php"); ?>
<?php //include_once("classes/personiterate.php"); ?>

<?php 
	function __autoload($class_name)
	{
		include("classes/".$class_name.".php");
	}
	spl_autoload_register(function($class_name){
		include("classes/".$class_name.".php");
	});
?>

          	<h2 style="text-align: center;">Late Static Binding</h2>
          
			<?php 

				class lsbChild extends lsb{
					public static function getclass()
					{
						return __CLASS__;
					}
				}

				$obj = new lsb();
				$obj->framework();

				$obj = new lsbChild();
				$obj->framework();
			?>
<?php include_once("pages/footer.php"); ?>