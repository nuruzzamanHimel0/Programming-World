<?php include_once("pages/header.php"); ?>


         
          	<h2 style="text-align: center;">Interface</h2>
           <?php
		   	
		   	interface school{
		   		public function school();
		   	}
		   	interface college{
		   		public function college();
		   	}
		   	interface versity{
		   		public function versity();
		   	}

		   	class teacher implements school,college,versity{

		   		public function __construct()
		   		{
		   			$this->school();
		   			$this->college();
		   			$this->versity();
		   		}

		   		public function school(){
		   			echo "I am a school teacher <br>";
		   		}
		   		public function college(){
		   			echo "I am a college teacher <br>";
		   		}
		   		public function versity(){
		   			echo "I am a versity teacher <br>";
		   		}
		   	}

		   $tecObj = new teacher();
		 
			?>
        
        

<?php include_once("pages/footer.php"); ?>