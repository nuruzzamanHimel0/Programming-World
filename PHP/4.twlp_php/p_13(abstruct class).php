<?php include_once("pages/header.php"); ?>


         
          	<h2 style="text-align: center;">Abstract Class</h2>
           <?php
		   	
		   		// abstract class student
		   		// {
		   		// 	public $name;
		   		// 	public $age;
		   		// 	// normal method.......................
		   		// 	public function details()
		   		// 	{
		   		// 		return "<b>".$this->name."</b> is <b>".$this->age."</b> Years Old <br>";
		   		// 	}
		   		// 	// abstract method......................
		   		// 	abstract public function uv();
		   		// }

		   		// class boy extends student{

		   		// 	public function description()
		   		// 	{
		   		// 		return parent::details()." I live in Satkhira, Khulna, Bangladesh <br>";
		   		// 	}

		   		// 	public function uv(){
		   		// 		return " I am Graduated From DIU U
		   		// 		niversity";
		   		// 	}
		   		// }

		   		// $Obj = new boy();
		   		// $Obj->name = "Himel";
		   		// $Obj->age = "24";
		   		// echo $Obj->description();
		   		// echo $Obj->uv();
			?>
			<?php 
				abstract class student{
					public $name;
					public $age;

					public function __construct($v1,$v2)
					{
						$this->name = $v1;
						$this->age = $v2;
					} 

					public function details()
					{
						return "My name is :<b>".$this->name."</b> and My age is :<b>".$this->age."</b>";
					}

					abstract public function uv();

				}

				class boy extends student {

					public function description()
					{
						echo parent::details()." And i am living in Satkhira,Khulna,Bangladesh <br>";
					}
					public function uv()
					{
						echo "I am graduated. <br>";
					}
				}

				$stdObj = new boy("Nuruzzaman","26");
				$stdObj->description();
				$stdObj->uv();
			?>
        
        

<?php include_once("pages/footer.php"); ?>