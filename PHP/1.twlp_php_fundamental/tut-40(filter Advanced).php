<?php date_default_timezone_set('Asia/Dhaka'); ?>
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
     		<hr width="100%" color="#CC0000">
        	<p style="margin:0; float:left;">Date and Time </p>
            <span style="float:right; color:#F00; margin:0;">
            	<?php echo date("h:i:s A"); ?>
            </span> <br>
        <hr width="100%" color="#CC0000">
        	<?php
            $url = "http://www.google.com?name=himel";
            if(filter_var($url,FILTER_VALIDATE_URL,FILTER_FLAG_QUERY_REQUIRED))
            {
            	echo "There have Query String <br>";
            }
			else
			{
				echo "There haven't Query String <br>";	
			}
           ?>
           <?php
		   	$num = 100;
			$min = 1;
			$max = 200;
			
			if(filter_var($num,FILTER_VALIDATE_INT,array("options"=> array("min_range"=>$min,"max_range"=>$max))))
			{
				echo "{$num} is validate range <br>";	
			}
			else
			{
			echo "{$num} isn't validate ranges <br>";	
				
			}
		   
		   ?>
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>