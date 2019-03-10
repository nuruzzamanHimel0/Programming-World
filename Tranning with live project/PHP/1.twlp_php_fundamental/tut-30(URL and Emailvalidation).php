<?php 
$name = $email = $website = $comment = $gender = NULL;
$errname = $erremail = $errweb = $errcom = $errgender= NULL ; ?>
   <?php 
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if(empty($_POST["name"]))
				{	
					$errname = "<span style=\"color: red;\">Name is Required. </span> " ;
				}
				else{
					$name =validate( $_POST["name"]);
					
				}
				
				
				if(empty($_POST["email"]))
				{	
					$erremail = "<span style=\"color: red;\">Email is Required. </span> " ;
				}
				else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
				{
					$erremail = "<span style=\"color: green;\">Email is Invalited. </span> " ;
				}
				else{
					$email = validate($_POST["email"]);
				}
				if(empty($_POST["website"]))
				{	
					$errweb = "<span style=\"color: red;\">Website is Required.</span>  " ;
				}
				else if(!filter_var($_POST["website"],FILTER_VALIDATE_URL))
				{
					$errweb = "<span style=\"color: green;\">Website is Invalidated. </span> " ;
				}
				else{
					$website = validate($_POST["website"]);
				}
				if(empty($_POST["gender"]))
				{	
					$errgender = "<span style=\"color: red;\">Gender is Required.</span>  " ;
				}
				else{
					$gender = validate($_POST["gender"]);
				}
				$comment = validate($_POST["comment"]);
				$comment =nl2br($comment);
				
			}
			function validate($data)
				{
					$data = trim($data);
					$data = htmlspecialchars($data);
					$data = stripcslashes($data); 
					return $data;			
				}
			
		?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP TWLP Fundamental</title>
<style>
	.phpcoding{ width: 900px; margin:0 auto; background:#ddd; padding:15px; }
	.headersection , .footersection{ background:#444; color:#fff; text-align:center; padding-top:15px; padding-bottom:15px; }
	.mainsection { min-height:450px; padding:20px;}
</style>
</head>

<body>
    <div class="phpcoding">
        <section class="headersection">
            <h2>PHP TWLP Fundamental </h2>
        </section>
        
        <section class="mainsection">
     
        	
            <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
            	<table>
                	<tr>
                    	<td> Name </td>
                        <td> <input type="text" name="name"  >&nbsp;&nbsp; * <?php echo $errname ; ?>  </td> 
                    </tr>
                    <tr>
                    	<td> E-mail </td>
                        <td><input type="text" name="email"  >&nbsp;&nbsp; * <?php echo $erremail ; ?>  </td>
                    </tr>
                    <tr>
                    	<td> Website </td>
                        <td> <input type="text" name="website"  >&nbsp;&nbsp; * <?php echo $errweb ; ?>  </td>
                    </tr>
                    <tr>
                    	<td> Comment </td>
                        <td><textarea name="comment" rows="5" cols="35" required > </textarea>  </td>
                    </tr>
                    <tr>
                    	<td> Gender </td>
                        <td> 
                        	<input type="radio" name="gender" value="male"  > Male
                            <input type="radio" name="gender" value="female" > Female
                            &nbsp;&nbsp;* <?php echo $errgender ; ?>  
                         </td>
                    </tr>
                    <tr>
                    	<td> </td>
                        <td>  </td>
                    </tr>
                    <tr>
                    	<td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                    	<td> </td>
                        <td><input type="Submit" name="submit" value="submit" > </td>
                    </tr>
                </table>
            </form>
            <?php
			if(isset($name) && isset($email) && isset($website) && isset($gender))
			{
				echo "Name = {$name} <br>";
				echo "Email = {$email} <br>";
				echo "Website = {$website} <br>";
				echo "Comment = {$comment} <br>";
				echo "Gender = {$gender} <br>";
			}
			else{
				$name = $email = $website = $comment = $gender = NULL;
			}
				
			?>
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>