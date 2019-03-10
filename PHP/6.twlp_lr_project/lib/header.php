<?php 
	include_once("session.php");
	session::sess_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<?php 
		if(isset($_GET['action']) AND $_GET['action'] == 'logout')
		{
			session::destroy();
			session::redirect("login.php");
		}
	?>
	

	<div class="headerSection">
		<div class="container containerStyle">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.php">LogIn & Registration System OOP & PDO</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<?php 
						$id = session::sess_get("id");
						$login = session::sess_get("login");
						if($login == true)
						{
					?>
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="profile.php?id=
						<?php 
						echo base64_encode($id);
						?>">Profile <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="?action=logout">LogOut <span class="sr-only">(current)</span></a>
					</li>
					<?php 
						}else{
					?>
					<li class="nav-item active">
						<a class="nav-link" href="login.php">LogIn <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
					</li>
					<?php } ?>
					
			
				</ul>
				
			</div>
		</nav>
		</div>
	</div> <!-- headerSection end............... -->