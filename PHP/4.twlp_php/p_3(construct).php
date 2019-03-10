<?php include_once("pages/header.php"); ?>


         
          	<h2 style="text-align: center;"> Class, Object and Method</h2>
           <?php
		   
		   class person{    // create class

		   	public $name;
		   	public $age;    // public, private & protected are ACCESS MODIFIER

		   	public function __construct($v1,$v2) // Create CONSTRUCTOR. It call when an object creaded.
		   	{
		   		$this->name = $v1;
		   		$this->age = $v2;
		   	}

		   	public function personDetails()  // create METHOD
		   	{
		   		return "Person name is : <b>".$this->name."</b> Person age is: <b>".$this->age."</b>";
		   	}
		   	

		   }

		   $personOne = new person("Nuruzzaman","24");    // create and OBJECT
		  echo $personOne->personDetails();
				
		   ?>
		   	
        
        

<?php include_once("pages/footer.php"); ?>