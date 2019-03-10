<?php 
class lsb{


	public function framework()
	{
		echo static::getclass()."<br>";
	}	

	public static function getclass()
	{
		return __CLASS__;
	}	
}

?>