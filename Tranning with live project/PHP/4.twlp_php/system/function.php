<?php 
	
	class calculator
	{
		public $result;

		public function sum($v1,$v2)
		{
			return $this->result = "SUm is : ".($v1+$v2)."<br>";
		}public function sub($v1,$v2)
		{
			return $this->result = "sub is : ".($v1-$v2)."<br>";
		}public function mul($v1,$v2)
		{
			return $this->result = "mul is : ".($v1*$v2)."<br>";
		}public function div($v1,$v2)
		{
			return $this->result = "div is : ".($v1/$v2)."<br>";
		}
	}

?>