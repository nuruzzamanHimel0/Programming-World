<?php include("classes/Shout.php"); ?>
<?php 
	$shout = new Shout();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Basic ShoutBox</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="wrapper clear">
			<section class="headerSection clear">
				<h2>`Basic South Box With PHP and OOP</h2>
			</section>
			<section class="contentSection clear">
				<div class="box ">
					<ul>
					<?php 
						$getData = $shout->getAllData();
						if($getData)
						{
							while ($value =  $getData->fetch_assoc()) {
					?>
					<li><span><?php echo $value['time']; ?></span>-<b><?php echo $value['name']; ?></b> <?php echo $value['body']; ?></li>
					<?php }	}?>
						
					</ul>
				</div>
			<?php 
				if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
				{
					$insertData = $shout->insertData($_POST);
				}
			?>
				<div class="southform clear">
					<form action="" method="post">
						<table>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><input type="text" name="name" required="required" placeholder="Enter Your Name"></td>
							</tr>
							<tr>
								<td>Body</td>
								<td>:</td>
								<td><input type="text" name="body" required="required" placeholder="Enter Your Text"></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><input type="submit" name="submit" value="South It" ></td>
							</tr>
						</table>
					</form>
				</div>
			</section>
			<section class="footerSection clear">
				<h2>`&copy; Nuruzzaman Himel</h2>
			</section>
		</div>
	</body>
</html>