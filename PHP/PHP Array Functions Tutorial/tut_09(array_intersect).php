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
			echo "ARRAY INTERSECT...........";
            	$array_one = array(
					"a" => "red",
					"b" => "green",
					"c" => "blue",
					"d" => "yellow"
				);
				$array_three = array(
					"c" => "red",
					"b" => "green",
					"d" => "yellow"
				);
				$array_two = array(
					"d" => "red",
					"f" => "black",
					"g" => "purpel"
					
				);	
				
				$result1 = array_intersect($array_one,$array_two);
				
				print_r($result1);
				
				 ?>
                 <br>  <br>
                 <?php
				 echo "ARRAY_INTERSECT_ASSOC()..........";
            	$array_one = array(
					"a" => "red",
					"b" => "green",
					"c" => "blue",
					"d" => "yellow",
				);
				$array_three = array(
					"a" => "red",
					"b" => "green",
					"d" => "yellow"
				);
				$array_two = array(
					"a" => "red",
					"c" => "green",
					"g" => "purpel",
					
				);	
				
				$result2 = array_intersect_assoc($array_one,$array_two);
				
				print_r($result2);
				
				 ?>
                 
                  <?php
				 echo "ARRAY_INTERSECT_KEY()..........";
            	$array_one = array(
					"a" => "red",
					"b" => "green",
					"c" => "blue",
					"d" => "yellow"
				);
				$array_three = array(
					"a" => "red",
					"b" => "green",
					"d" => "yellow"
				);
				$array_two = array(
					"a" => "red",
					"b" => "purpel",
					"g" => "purpel"
					
				);	
				
				$result3 = array_intersect_key($array_one,$array_three,$array_two);
				
				print_r($result3);
				
				 ?>
                 </pre>
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>