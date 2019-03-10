<?php 
class th2{
	public $fromth1;
	public function __construct(th1 $a)
	{
		$this->fromth1 = $a;
		$this->fromth1->fw();
		$this->fromth1->cal();
	}
}

?>