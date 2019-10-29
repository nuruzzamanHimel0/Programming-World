<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
</head>
<body>
	<h1>USER.PHP IS HERE..................</h1>

	<?php
	echo "<pre>";
		print_r($_GET);
echo "Username: ". preg_replace('#[^0-9a-z_]#i', '', $_GET['u']);
?>
</body>
</html>