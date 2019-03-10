<?php include_once("headerSection.php") ?>

<?php
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];	
		$gender = $_POST["gender"];
		$dep = $_POST["dep"];
		$coder = $_POST["coder"];
?>

<table class="tblone">
    <tr>
        <td colspan="2" align="center"> Output</td>
    </tr>
    <tr>
        <td>Name </td>
        <td> <?php echo $name; ?></td>
    </tr>
    <tr>
        <td>Gender </td>
        <?php if($gender == "Male")	{?>
        <td><?php echo $gender;  ?> </td>
        <?php } 
         else if($gender == "Female")	{?>
        <td><?php echo $gender;  ?> </td>
        <?php } ?>
    </tr>
    <tr>
        <td>Department </td>
         <?php if($dep == "CSE")	{?>
        <td><?php echo $dep;  ?> </td>
        <?php } 
         else if($dep == "Math")	{?>
        <td><?php echo $dep;  ?> </td>
        <?php } 
         else if($dep == "Physics")	{?>
        <td><?php echo $dep;  ?> </td>
        <?php } ?>
    </tr>
    <tr>
        <td>Coder </td>
        <td> <?php echo $coder; ?></td>
    </tr>

</table>
<?php } ?>
 <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="myform" method="post" >
 	<table border="0">
    	<tr> 
        	<td>Name: </td>
            <td><input type="text" name="name" required> </td>
        </tr>
        <tr> 
        	<td>Gender: </td>
            <td>
            	<input type="radio" name="gender" value="Male" > Male
            	<input type="radio" name="gender" value="Female" >Female
            </td>
        </tr>
        <tr> 
        	<td>Department: </td>
            <td>
            	<input type="checkbox" name="dep" value="CSE" > CSE
            	<input type="checkbox" name="dep" value="Math" >Math
                <input type="checkbox" name="dep" value="Physics" >Physics
            </td>
        </tr>
        <tr> 
        	<td>Coder: </td>
            <td>
            	<select name="coder" required>
                	<option value="">Select One </option>
                    <option value="JAVA">JAVA </option>
                    <option value="HTML">HTML </option>
                    <option value="CSS">CSS </option>
                </select>
            </td>
        </tr>
         <tr> 
        	<td> </td>
            <td>
            	<input type="submit" name="submit" value="submit" >
            </td>
        </tr>
    
    </table>
 </form>  
    
    
    
    
    
     
        	
       
			
<?php include_once("footerSection.php") ?>