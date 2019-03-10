<?php include_once("pages/header.php"); ?>


         
          	<h2 style="text-align: center;">Static Property and Method</h2>
           <?php
		   
			class person
			{

				public $name;
				public $age;
				public static $personname = "Md. Habibur Rahman"; // consttabat property is always PUBLIC

				public function __construct($v1,$v2)
				{
					$this->name = $v1;
					$this->age = $v2;
					
				}
				public function __destruct()
				{
					usset($this->name);
					usset($this->age);
				}
				public static function display()
				{
					echo "Your name is : ".self::$personname;
				}

			}
			$personOne = new person("himel","25");
			 person::display(); //or
			// $personOne->display();	
		 
			?>
        
        

<?php include_once("pages/footer.php"); ?>