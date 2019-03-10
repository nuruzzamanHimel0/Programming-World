<?php include_once("pages/header.php"); ?>
<?php include_once("system/function.php"); ?> 

         
          	<h2 style="text-align: center;"> Class, Object and Method Calculator</h2>
      
	<?php 

        	if(isset($_POST["submit"]))
        	{
        		$num1 = $_POST["num1"];
        		$num2 = $_POST["num2"];
        		if(empty($num1) || empty($num2))
        		{
        			echo "<span style='color:red;'> Field Can't Be Empty </span><br>";
        		}
        		else{
        			echo "<span style='color:green;'>"."Num1 =".$num1."Num2 =".$num2 ." </span><br>";
        			$calculatorOne = new calculator();
        			echo $calculatorOne->sum($num1,$num2);
        			echo $calculatorOne->sub($num1,$num2);
        			echo $calculatorOne->mul($num1,$num2);
        			echo $calculatorOne->div($num1,$num2);
        		}
        	}
        ?>


       <form action="" method="post">
        	<table>
        		 <tr>
        		 	<td>First Number:</td>
        		 	<td><input type="number" name="num1"></td>
        		 </tr>
        		  <tr>
        		 	<td>Second Number:</td>
        		 	<td><input type="number" name="num2"></td>
        		 </tr>
        		  <tr>
        		 	<td></td>
        		 	<td><input type="submit" name="submit" value="submit"></td>
        		 </tr>
        	</table>
        </form>
		   	




        

<?php include_once("pages/footer.php"); ?>