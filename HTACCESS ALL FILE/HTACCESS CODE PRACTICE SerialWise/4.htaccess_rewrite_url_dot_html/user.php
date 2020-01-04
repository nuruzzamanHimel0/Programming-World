<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>user page</title>
</head>
<body>
	<h1>USER PAGE............</h1>
	<?php 
		if(!isset($_GET['id']) OR empty($_GET['id']) )
		{
			header("Location: test.php");
		}
		else{
			echo "<pre>";
			print_r($_GET);
			echo "User id=".$_GET['id']."<br>";
			
		}
	?>
</body>
</html>