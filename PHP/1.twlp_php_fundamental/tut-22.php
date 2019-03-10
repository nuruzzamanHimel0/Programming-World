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
		   		$cars = array(
					array("BMW",10,20),
					array("VOLVO",15,19),
					array("AAA",9,25),
					array("bbb",35,5)
				);
				
				for($row = 0 ;$row<4;$row++)
				{
					echo "<p> Row Number : {$row}</p>";
					echo "<ul>";
					
					for($col=0;$col<3;$col++)
					{
						echo "<li>". $cars[$row][$col]."</li>";
					}
					
					echo "</ul>";
				}
				
				$age = array("Himel" => 20,"Sezan" => 21,"ZZZ" =>22);
				foreach($age as $key => $value)
				{
					echo $key." age is ".$value."<br>";
				}
		   ?>
        </section>
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>