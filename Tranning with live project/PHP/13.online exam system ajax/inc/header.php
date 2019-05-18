<?php 
		$filepath = realpath(dirname(__FILE__));
		// echo $filepath;

		include_once($filepath."/../lib/Session.php");
		Session::init();
		include_once($filepath."/../lib/Database.php");
		include_once($filepath."/../helpers/Format.php");

		spl_autoload_register(function($class_name){
			$filepath = realpath(dirname(__FILE__));
			
			include_once($filepath."/../classes/".$class_name.".php");
			// include_once("classes/".$class_name.".php");
		});

		$db = new Database();
		$fm = new Format();
		$usr = new User();
		$exm = new Exam();
		$pro = new Process();

		$userId = Session::get('userId');


?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</head>
<body>

	<?php 
	if(isset($_GET['action']) AND $_GET['action']== 'userLogout')
	{
		Session::destroy();
		header("Location:index.php");
		exit();
	}
?>

<div class="phpcoding">
	<section class="headeroption"></section>
		<section class="maincontent">
		<div class="menu">
		<ul>
		<?php 
			$login = Session::get('userLogin');
			if($login == 'TURE')
			{
		?>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="exam.php">Exam</a></li>
			<li><a href="?action=userLogout">Logout</a></li>
		<?php		
			}else{
		?>

			<li><a href="index.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		<?php } ?>
			
		</ul>
		<?php 
			if($login == 'TURE')
			{
		?>
			<span style="float: right; color: #0e0c05; font-size: 20px;">
				Welcome <strong><?php echo Session::get('username'); ?></strong>
			</span>
	<?php } ?>
		</div>
	