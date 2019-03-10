<?php 
class personiterate{

	public $name = "Md. Nuruzzaman";
	public $age = 24;
	public $skill = "Php Develop";
	
	private $email = "himel@gmail.com";
	protected $pass = "pass";
	
	public function iterateFunc()
	{
		echo "Inside the personiterate class.....";
		foreach($this as $k=>$v)
			{	
				
				echo "<pre>";
				echo $k;
				echo "=>";
				echo $v;
				echo "</pre>";
			}
	}
	
}

?>