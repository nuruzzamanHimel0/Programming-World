<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$date1=date_create("2013-03-15");

$date2=date_create("2013-12-12");

$diff=date_diff($date1,$date2);
$period = $diff->format("%R%a days");

echo $period;
?>
</body>
</html>