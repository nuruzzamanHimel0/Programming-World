<?php 
	include("controller/Controller.php");
	// spl_autoload_register(function($class_name){
	// 	include("controller/".$class_name.".php");
	// 	echo "controller/".$class_name.".php";
	// });
	$controllerObj = new Controller();
	$controllerObj->home();
?>