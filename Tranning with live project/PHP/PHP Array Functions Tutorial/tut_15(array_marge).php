<?php date_default_timezone_set('Asia/Dhaka'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Array Functions Tutorial</title>
<style>
	.phpcoding{ width: 900px; margin:0 auto; background:#ddd; padding:15px; }
	.headersection , .footersection{ background:#444; color:#fff; text-align:center; padding-top:15px; padding-bottom:15px; }
	.mainsection { min-height:450px; padding:20px;}
</style>
</head>

<body>
    <div class="phpcoding">
        <section class="headersection">
            <h2>PHP Array Functions Tutorial </h2>
        </section>
        
        <section class="mainsection">
     		<hr width="100%" color="#CC0000">
        	<p style="margin:0; float:left;">Date and Time </p>
            <span style="float:right; color:#F00; margin:0;">
            	<?php echo date("h:i:s A"); ?>
            </span> <br>
        <hr width="100%" color="#CC0000">
        <pre>	<?php
			
			$array_one = array(10,20,30);
			$array_two = array(40,50);
			
			$result = array_merge($array_one,$array_two);
				print_r($result);	
				 ?>

                 </pre>
                 <br>
                 <pre>	<?php
			
			$array_one = array(
				"a" => "red",
				"b" => "green"
			);
			
			$array_two = array(
				"c" => "yellow",
				"b" => "black"
			);
			
			$result = array_merge($array_one,$array_two);
				print_r($result);	
				 ?>

                 </pre>
         
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>