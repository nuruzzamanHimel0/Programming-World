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
			
				function myFunction($value)
				{
					$value = strtoupper($value);
					return $value;
				}
            	$arr = array(
					"Animal"=> "cow",
					"Type" =>"mamel"
				);
				
				foreach($arr as $key=>$value)
				{
					$result[$key] = myFunction($value);
				}
				
				print_r($result);	
				 ?>

                 </pre>
                 <br>
                 <pre>	<?php
			echo "Using Array_map().................<br>";
				function myFunction1($value)
				{
					$value = strtoupper($value);
					return $value;
				}
            	$arr1 = array(
					"Animal"=> "cow",
					"Type" =>"mamel"
				);
				
				$result1 = array_map("myFunction1",$arr1);
				
				print_r($result1);	
				 ?>

                 </pre>
                 <pre><?php
				 	function sum($value)
					{
						$value = $value+$value;
						return $value;
					}
					$array = array(10,20);
					$result = array_map("sum",$array);
					
					print_r($result);
				 
				 ?></pre>
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>