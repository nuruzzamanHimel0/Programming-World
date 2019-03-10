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
				$a = array("zzz" =>10,"aaa"=>15,"kkk"=>5);
				ksort($a);
				foreach($a as $key=> $value)
				{
					echo $key." = ".$value."<br>";
				}
			?>
            <br> <br>
            <?php
				$a = array("zzz" =>10,"aaa"=>15,"kkk"=>5);
				asort($a);
				foreach($a as $key=> $value)
				{
					echo $key." = ".$value."<br>";
				}
			?>
            
            <pre><?php
				$a = array("zzz" =>10,"aaa"=>15,"kkk"=>5);
				$e = implode(" * ",$a);
				print_r($e);
			?></pre>
            
            <pre><?php
				
				$ex = explode(" * ",$e);
				print_r($ex );
			?></pre>
        </section>
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>