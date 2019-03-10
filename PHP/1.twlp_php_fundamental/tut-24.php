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
          <pre> <?php
		   		$a = array(10,20,30,40,50,60,70,80);
				print_r($a);
		   ?></pre>
           <pre><?php
		   sort($a); print_r($a);
		   
		   rsort($a); print_r($a);
		   
		  
		   ?>*/</pre>
           <?php
		   /* $ans = implode(",",$a); print_r($ans);
			echo "<br>";
			print_r(explode(',', $ans));
		   echo "<br>";*/
		   ?>
          <pre> <?php
		   		/*$age = array("Rahim" => 20,"Karim" => 10,"Himel" => 15);
				ksort($age); 
				foreach($age as $key => $value)
				{
					echo "Key is = ".$key." value = ".$value."<br>";
				}*/
		   ?></pre>
        </section>
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>