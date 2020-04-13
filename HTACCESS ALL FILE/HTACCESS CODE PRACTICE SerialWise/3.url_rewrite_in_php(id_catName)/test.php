
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FILE</title>
</head>
<body>
	<h1>FILE.PHP IS HERE.........</h1>
	
	<?php 
	$cat_name = 99;
	for ($i=1; $i <10 ; $i++) {
		$cat_name = $cat_name-1;
	 ?>
		<a href="user/<?php echo $i; ?>/<?php echo "Cat_name".$cat_name;  ?>" target="_blank"> Item <?php echo $i; ?></a>	<br>
	<?php	}?>

	<br><br>

	<?php 
	$cat_name = 99;
	for ($i=1; $i <10 ; $i++) {
		$cat_name = $cat_name-1;
	 ?>
		<a href="admin/user/<?php echo $i; ?>/<?php echo "Cat_name".$cat_name;  ?>" target="_blank"> Admin Item <?php echo $i; ?></a>	<br>
	<?php	}?>
</body>
<a href="" ></a>
</html>