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
         <pre><?php
		 	$name = array("Himel","AAA","ZZZ","BBB","YYY");
			sort($name);
			print_r($name);
			rsort($name);
			print_r($name);
		 ?></pre>
        Implode: <?php
         	$implode = implode(" , ",$name);
			echo $implode;
			
     	?><br>
        Explode:<pre><?php
			$explode = explode(" , ",$implode);
			print_r($explode);
		?></pre>
        
        <?php
			$array = array("aimel"=> 20, "sezan"=>10, "tamal"=>30);
			asort($array);
			foreach($array as $key=> $value)
			{
				echo $key." = ".$value."<br>";
			}
			
		?>
        <br>
         <?php
			$array = array("aimel"=> 20, "sezan"=>10, "tamal"=>30);
			ksort($array);
			foreach($array as $key=> $value)
			{
				echo $key." = ".$value."<br>";
			}
			
		?>
        </section>
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>