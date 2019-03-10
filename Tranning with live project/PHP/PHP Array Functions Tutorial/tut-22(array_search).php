
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
        <?php
	$a = array("a"=>"AAA","b"=>"BBB","c"=>"CCC");
	if(isset($_POST["text"]))
	{
			global $text;
		
			$text =$_POST["text"];
			$key = array_search($text,$a);	
			echo "You have searched by= ". $text." and Your key is= ". $key;
		
		
	}

?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        	<input type="text" name="text" value="<?php global $text; echo $text; ?>">
            <input type="submit" name="submit" value="Submit"> 
        </form>
      <pre>  <?php
		echo "array_slice () function uses.........................";
			$b = array("AAA","BBB","CCC","SSS","FFF");
			
			$result1 = array_slice($b,-4,3);
			$result2 = array_slice($b,1,3);
			print_r($result1);
			print_r($result2);
			
		
		?></pre>
        <pre>  <?php
		echo "array_uniqe () function uses.........................";
			$b = array(1,2,3,4,5,1,3,2,5,4,9);
			
			$result1 = array_unique($b);
			
			print_r($result1);
			
			$color = array(
				"a" => "red",
				"b" => "blue",
				"c" => "green",
				"d" => "yellow",
				"e" => "red",
				"a" => "green",
				"b" => "violate",
			);
			
			$result1 = array_unique($color);
			
			print_r($result1);
		
		?></pre>
        
        <pre>  <?php
		echo "array_values () function uses.........................";
			
			$color = array(
				"a" => "red",
				"b" => "blue",
				"c" => "green",
				"d" => "yellow",
				
			);
			
			$result1 = array_values($color);
			
			print_r($result1);
		
		?></pre>
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>