<?php include_once("headerSection.php") ?>
    
    
    
  <?php
  $name =NULL;$gender=NULL;
  if(isset($_POST["submit"]))
  {	
		 $name = $_POST["name"];
		$gender = $_POST["gender"];
		$checkBox = $_POST["checkbox"];
		if(isset($name)){
			echo "Your name is".$name."<br>";
		}
	 if(isset($gender))
	  {
		  if($gender == "Male")
		  {
			echo "Your are Male <br>";  
		  }
		  else if($gender == "Female")
		  {
			echo "Your are Female <br>" ;  
		  }
	   }
	    echo "You have selected :";
	   if(isset($checkBox))
	   {
		   foreach($checkBox as  $value)
		   {
			   echo $value.",";
		   }
	   }
	
	  
  }

  
  ?>  

 <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
 Your name:<input type="text" name="name" value="" required><br>
 
 			<input type="radio" name="gender" value="Male" >Male
            <input type="radio" name="gender" value="Female" >Female
            <br>
            
            <input type="checkbox" name="checkbox[]" value="HTML" >HTML
            <input type="checkbox" name="checkbox[]" value="CSS" >CSS
            <input type="checkbox" name="checkbox[]" value="Javascript" >Javascript
              <br>
 <input type="submit" name="submit" value="Submit" >
 <input type="reset" name="reset" value="Reset" >
 
 </form>   
    
    
    
    
    
    
    
     
        	
       
			
<?php include_once("footerSection.php") ?>