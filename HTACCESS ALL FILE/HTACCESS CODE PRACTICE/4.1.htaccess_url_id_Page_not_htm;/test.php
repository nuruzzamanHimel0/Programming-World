
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
		<a href="user/id/<?php echo $i; ?>/my_id/<?php echo $my_id.".html"; ?>" target="_blank"> Item <?php echo $i; ?></a>	<br>
	<?php	}?>
</body>
<a href="" ></a>
</html>