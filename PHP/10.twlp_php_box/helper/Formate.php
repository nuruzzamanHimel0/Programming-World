<?php 

class Formate{
	
	public function validation($text)
	{
		$text = ucfirst($text);
		$text = trim($text);
		$text = stripcslashes($text);
		$text = htmlentities($text);
		
		return $text;
	}
}
?>