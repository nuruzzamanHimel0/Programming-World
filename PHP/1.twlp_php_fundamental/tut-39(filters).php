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
        	<!--<!--<table>
            	<tr>
                <td>Filter Name </td>
                <td>Filter Id </td>
                </tr>
            	<?php
					/*foreach(filter_list() as $id => $filter)
					{
						echo "<tr>";
							echo "<td> {$filter} </td>";
							echo "<td> filter_id($filter) </td>";
						echo "</tr>";	
					}*/
				?>
            <!--</table>-->
        	
            <?php
				/*$str = "<h1> My name is himel </h1>";
			 	echo $output = filter_var($str,FILTER_SANITIZE_STRING)*/
			?>
        	
           
        </section> 
        
        <section class="footersection">
            <h2>Practice By Md. Nuruzzaman himel </h2>
        </section>
    </div>

</body>
</html>