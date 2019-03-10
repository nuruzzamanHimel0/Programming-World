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
        	
            <?php
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$username = $_REQUEST["username"];
					
					if(empty($username))
					{
						echo "<span style=\"color:red;\">User name not found </span>";	
					}
					else{
						
						echo "<span style=\"color:green;\">User name is ".$username."</span>";	
					}
				}
				
			?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ;?>" method="post">
        		Username : <input type="text" name="username">
                <input type="submit" name="submit">
            </form>
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>