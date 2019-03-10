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
			
				$a_one= array("AAA","BBB");
				
				$a_two= array("DDD","CCC");
				
				array_multisort($a_one,SORT_DESC,$a_two,SORT_DESC);				
				print_r($a_one);
				print_r($a_two);	
				 ?>

                 </pre>
                 <br>
                  <pre>
                 <?php
			echo "array_pad().....................function.......<br>";
				$a_three = array("AAA","BBB");
				$result = array_pad($a_three,5,"blue"); 

				print_r($result);	
				 ?>

                 </pre>
                 <br>
                  <pre>
                 <?php
			echo "array_push and array_pop().....................function.......<br>";
				$a_four = array("AAA","BBB");
				
				array_push($a_four,"DDD","EEE"); 

				print_r($a_four);	
				
				array_pop($a_four);
				
				print_r($a_four);	
				 ?>

                 </pre>
                 <br>
                 <pre>
                   <?php
			echo "array_replace().....................function.......<br>";
				$a_four = array("AAA","BBB");
				$a_five = array("CCC","DDD");
				
				$result = array_replace($a_four,$a_five);

				print_r($result);	
				
				$a_four = array("a" => "AAA","b" =>"BBB");
				$a_five = array("a" =>"CCC","d" => "DDD");
				
				$result = array_replace($a_four,$a_five);

				print_r($result);	
				
				 ?>

                 </pre>
                 <br>
              
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>