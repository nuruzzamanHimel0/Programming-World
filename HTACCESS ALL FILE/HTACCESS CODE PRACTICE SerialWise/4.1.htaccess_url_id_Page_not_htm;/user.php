<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>user page</title>
</head>
<body>
	<h1>USER PAGE............</h1>
	<?php 
		if(!isset($_GET['id']) OR empty($_GET['id']) OR !isset($_GET['my_id']) OR empty($_GET['my_id']) )
		{
			header("Location: test.php");
		}
		else{
			echo "<pre>";
			print_r($_GET);
			echo "User id=".$_GET['id']."<br>";
			echo "User my_id=".$_GET['my_id']."<br>";
			
		}
	?>
</body>
</html>