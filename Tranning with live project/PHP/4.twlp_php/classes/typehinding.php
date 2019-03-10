<?php 
class typehinding{

	public $num1;
	public $num2;
	public $ope;
	public $result;
	
	public function getmethod(array $value)
	{
		foreach($value as $v)
		{
			echo $v[0];
			echo ":";
			echo $v[1]*$v[2]."<br>";
		}
	}
	
}

?>