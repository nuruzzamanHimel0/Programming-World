<?php 
	
	class formate{
		
		public function validation($text)
		{
			$text = trim($text);
			$text = stripcslashes($text);
			$text = htmlentities($text);
			return $text;
		}

		public function formateDate($date)
		{
			return date("F j, Y, g:i a",strtotime($date)); 
			//June 21, 2018, 11:53 am 
		}

		public function textShort($text,$limit=200)
		{
			$text = substr($text,0,$limit);
			$text = substr($text,0,strrpos($text, ' '));
			$text = $text.".....";
			return $text;
		}
// dynamic title name handelin........................
		public function title()
        {
            $path = $_SERVER['SCRIPT_FILENAME']; // take url path script name
            $name = basename($path,'.php');
            $name = strtolower($name);
            $name = str_replace("_"," ",$name);
            if($name == 'index')
            {
                $name = "Home";
            }
            elseif($name == 'contuct')
            {
                $name = "Contuct";
            }
            elseif($name == 'about')
            {
                $name = "about";
            }
            return $name;
        }
	}
?>