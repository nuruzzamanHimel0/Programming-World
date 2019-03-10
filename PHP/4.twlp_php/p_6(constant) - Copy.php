<?php include_once("pages/header.php"); ?>


         
          	<h2 style="text-align: center;"> Class, Object and Method</h2>
           <?php
		   
			class person
			{

				public $name;
				public $age;
				const NAME = "Md. Habibur Rahman"; // consttabat property is always PUBLIC

				public function __construct($v1,$v2)
				{
					$this->name = $v1;
					$this->age = $v2;
					echo "Name is : ".$this->name." <br> Age is: ".$this->age."<br>";
				}
				public function __destruct()
				{
					usset($this->name);
					usset($this->age);
				}

				public function display()
				{
					echo "Your name is : ".person::NAME;
				}

			}
			$personOne = new person("himel","25");
			$personOne->display();	
		 
			?>
        
        

<?php include_once("pages/footer.php"); ?>