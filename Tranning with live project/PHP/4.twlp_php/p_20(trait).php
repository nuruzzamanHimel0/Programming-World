<?php include_once("pages/header.php"); ?>
<?php //include_once("classes/personiterate.php"); ?>

<?php 
// autoload function always call when object created...........
	
?>

          	<h2 style="text-align: center;" Mehod chaining>PHP Trait</h2>
           <?php
				trait java{
					public function javaOne()
					{
						echo "I love java <br>";
					}
				}

				trait php{
					public function phpOne()
					{
						echo "I love php <br>";
					}
				}
				 // trait coderOneTrait{
				 // 	use java,php;
				 // }
				class codeOne
					{
					
					}
				class codeTwo{
					use java,php;
				}

				$obj1 = new codeTwo();
				$obj1->javaOne();
				$obj1->phpOne();
				
			?>
        
        

<?php include_once("pages/footer.php"); ?>