<?php include_once("pages/header.php"); ?>


         
          	<h2 style="text-align: center;">Static Propertu and Method</h2>
           <?php
		   
			class userdata
			{

				public $name;
				public $age;

				public function __construct($v1,$v2)
				{
					$this->name = $v1;
					$this->age = $v2;
				}
				public function display()
				{
					echo "Your name is : ".$this->name. " Age is : ".$this->age."<br>";
				}
			}

			class admin extends userdata{
				public $level;
				public function display()
				{
					echo "Your name is : ".$this->name. " Age is : ".$this->age." Level is :".$this->level;
				}
			}
			$personOne = new userdata("himel","25");
			$personOne->display();	
			$adminOne = new admin("sezan","20");
			$adminOne->level = "CSE";
			$adminOne->display();
		 
			?>
        
        

<?php include_once("pages/footer.php"); ?>