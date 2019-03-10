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
            	/*$a = 10;
				$b = "10";
				
				if($a === $b)
				{
					echo "Rright";	
				}
				else
				{
					echo "Wrong";		
				}*/
				
				$a = 10;
				$b = 20;
				function sum()
				{
					/*global $a;
					global $b;
					global $c;
					$c =$a+$b;*/
					$GLOBALS["c"]=$GLOBALS["a"]+$GLOBALS["b"];
				}
				sum();
				echo $c."<br>";
            ?>
            <?php
				echo "PHP SELF : ".$_SERVER['PHP_SELF']."<br>";
				echo "SERVER NAME : ".$_SERVER['SERVER_NAME']."<br>";
				echo "SCRIPT NAME : ".$_SERVER['SCRIPT_NAME']."<br>";
				echo "HTTP USER AGENT : ".$_SERVER['HTTP_USER_AGENT']."<br>";
				echo "SERVER ADDR : ".$_SERVER['SERVER_ADDR']."<br>";
				
			?>
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>