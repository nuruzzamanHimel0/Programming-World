<?php 
	include("model/Model.php");
	// spl_autoload_register(function($class_name){
	// 	//include("../model/".$class_name.".php");
	// });
	class Controller 
	{
		public $model;
		public function __construct()
		{
			$this->model = new Model();
		}
		public function home()
		{
			 $user = $this->model->getStudentData();
			 include("view/home.php");
		}
	}
?> 
