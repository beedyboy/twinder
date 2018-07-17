
	<?php

class Session
{

 function __construct()
 {
 		if(!isset($_SESSION))
 		{
 				session_start();
 		}

		 
 }
	 

public static function exists($name)
{
	return (isset($_SESSION[$name])) ? true : false;
	// if(isset($_SESSION[$name])) : return true; eles: return false; endif;
}
/**
 * [get session name that exists]
 * @param  [type] $name [name of session]
 * @return [type]       [the sessionmessage]
 */
public static function get($name)
{

	if(self::exists($name)):
	return $_SESSION[$name];
	else:
		return false;
	endif;
}



public static function set($name, $value)
{
	return $_SESSION[$name] = $value;
}


public static function delete($name)
{
	if(self::exists($name))
	{
		unset($_SESSION[$name]);
	}
}

public static function uagent_no_version()
{
	$uagent = $_SERVER['HTTP_USER_AGENT'];

	$regex = '/\/[a-z0A-Z0-9.]+/';

	$regString = preg_replace($regex, '', $uagent);

	return $regString;

}

/**
 * [flash users messages when an event is triggered. it does not last long]
 * @param  string $name    [flash name]
 * @param  string $message [message to display for user]
 * @param  string $class   [class could be empty but defines what type of display message  to use. it is success by default]
 * @return [type]          [html message]
 */
public static function flash($name = '', $message = '', $class = ' bg-success ')
{
	// we can only do something if the name is not empty
	
	if(!empty($name))
	{
		//no message, create it 
		//
		if(!empty($message) && empty($_SESSION[$name]))
		{
			if(!empty($_SESSION[$name]))
			{
				unset($_SESSION[$name]);
			}
			if(!empty($_SESSION[$name.'_class']))
			{
				unset($_SESSION[$name.'_class']);
			}

			$_SESSION[$name] = $message;
			$_SESSION[$name.'_class'] = $class;
		}

		//Message exists. display it
		elseif (!empty($_SESSION[$name]) && empty($message)) 
		{
			# code...
		$class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : 'bg-success';
		echo '<div class="'.$class.'" id="msg_flash">'.$_SESSION[$name].'</div>';
		unset($_SESSION[$name]);
		unset($_SESSION[$name.'_class']);
		}
	}

}


}