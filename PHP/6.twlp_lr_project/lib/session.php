<?php 
	
	class session{
		
		public static function sess_start()
		{
			session_start();
		}

		public static function sess_set($k,$v)
		{
			$_SESSION[$k] = $v;
		}

		public static function sess_get($k)
		{
			
			if(isset($_SESSION[$k]))
			{
				return $_SESSION[$k];
			}
			else{
				return FALSE;
			}
		}
		public static function redirect($location)
		{
			header("Location: ".$location);
			exit();
		}

		public static function checkLogOut()
		{
			if(self::sess_get('login') == false)
				{
					self::destroy();
					self::redirect("login.php");
				}
		}

		public static function checkLogIn()
		{
			if(self::sess_get('login') == true)
				{
					self::redirect("index.php");
				}
		}

		
		public static function destroy()
		{
			session_unset();
			session_destroy();
		}
	}
?>