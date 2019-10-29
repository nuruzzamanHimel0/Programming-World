
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FILE</title>
</head>
<body>
	<h1>FILE.PHP IS HERE.........</h1>
	
	<?php 
	$my_id = 99;
	for ($i=1; $i <10 ; $i++) {
		$my_id = $my_id-1;
	 ?>
		<a href="user/<?php echo $i; ?>" target="_blank"> Item <?php echo $i; ?></a>	<br>
	<?php	}?>


	<h1>Garmanyyy.........</h1>

	<?php 
	$my_id = 99;
	for ($i=1; $i <10 ; $i++) {
		$my_id = $my_id-1;
	 ?>
		<a href="user/garmany/<?php echo $i; ?>/<?php echo "Germany"; ?>" target="_blank"> Garmany <?php echo $i; ?></a>	<br>
	<?php	}?>


	<h1>USA.........</h1>

	<?php 
	$my_id = 99;
	for ($i=1; $i <10 ; $i++) {
		$my_id = $my_id-1;
	 ?>
		<a href="user/usa/<?php echo $i; ?>/<?php echo "USA"; ?>" target="_blank"> USA <?php echo $i; ?></a>	<br>
	<?php	}?>



</body>
<a href="" ></a>
</html>