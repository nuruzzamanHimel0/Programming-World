<?php include_once("pages/header.php"); ?>


         
          	<h2 style="text-align: center;"> Class, Object and Method</h2>
           <?php
		   
		   class person{    // create class

		   	public $name;
		   	public $age;    // public, private & protected are ACCESS MODIFIER

		   	public function personName()  // create METHOD
		   	{
		   		echo "Person name is : ".$this->name."<br>"  ;
		   	}
		   	public function personAge($value)  // create METHOD
		   	{
		   		echo $this->age = $value;
		   	}

		   }

		   $personOne = new person();    // create and OBJECT
		   $personOne->name = "Md. Nuruzzaman Himel";
		   $personOne->personName();
		   $personOne->personAge("24");
				
		   ?>
		   	
        
        

<?php include_once("pages/footer.php"); ?>