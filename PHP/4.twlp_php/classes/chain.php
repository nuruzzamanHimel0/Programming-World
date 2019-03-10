<?php 
class chain{

	// public function framework()
	// {
	// 	echo "CakePHP is a franework <br>";
	// 	return $this;
	// }

	// public function CMS()
	// {
	// 	echo "CMS is a site name <br>";
	// 	return $this;
	// }

	
	public $num1;
	public $num2;
	public $ope;
	public $result;
	
	public function getmethod($n1,$n2)
	{
		$this->num1 = $n1;
		$this->num2 = $n2;
		return $this; // return instance..............
	}
	
	public function calculat()
	{
		$this->result = "Result is =".($this->num1+$this->num2);
		return $this->result;
	}
}

?>