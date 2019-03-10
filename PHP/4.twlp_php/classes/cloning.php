<?php 
class cloning{

	public $a;
	public $b;

	public function setCat($value)
	{
		$this->a = $value;
	}
	public function getCat()
	{
		return $this->a;
	}
	public function setFw($value)
	{
		$this->b = $value;
	}
	public function getFw()
	{
		return $this->b;
	}
}

?>