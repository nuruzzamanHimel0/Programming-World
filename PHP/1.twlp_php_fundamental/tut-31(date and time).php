<?php date_default_timezone_set('Asia/Dhaka');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP TWLP Fundamental</title>
<style>
	.phpcoding{ width: 900px; margin:0 auto; background:#ddd; padding:15px; }
	.headersection , .footersection{ background:#444; color:#fff; text-align:center; padding-top:15px; padding-bottom:15px; }
	.mainsection { min-height:450px; padding:20px;}
	p.cpy{margin:0; font-size:18px; font-weight:bold;}
	p.dat{}
</style>
</head>

<body>
    <div class="phpcoding">
        <section class="headersection">
            <h2>PHP TWLP Fundamental </h2>
        </section>
        
        <section class="mainsection">
     	<hr width="100%" color="#CC0000">
        	<p style="margin:0; float:left;">Date and Time </p>
            <span style="float:right; color:#F00; margin:0;">
            	<?php echo date("h:i:s A"); ?>
            </span> <br>
        <hr width="100%" color="#CC0000">
        	
            <?php
				
				echo date("d/m/Y")."<br>";
				echo date("l")."<br>";
				echo date("h:i:s A")."<br>";
				echo date_default_timezone_get();
				
			
			?>
        </section> 
        
        <section class="footersection">
        	<p class="cpy"> &copy <?php echo date("Y"); ?> practices </p>
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>