<?php
include("includes/constant.cbt.php");
	
/**
* INCLUDES path
*/
if (!defined("INCLUDES_PATH")) {
	define("INCLUDES_PATH", "includes");
}

/**
*  TEMPLATES path
*/
if (!defined("TEMPLATES_PATH")) {
	define("TEMPLATES_PATH", "templates");
}
/*
*  SUB (ORDER TEMPLATES path
**/
if (!defined("ORDER_TEMPLATES_PATH")) {
	define("ORDER_TEMPLATES_PATH", TEMPLATES_PATH . DS . "sub");
}
/**
* LABEL path
*/
if (!defined("LABELS_PATH")) {
	define("LABELS_PATH", TEMPLATES_PATH . DS . "labels");
}
/**
*   CLASS path
*/
if (!defined("INCLUDES_CLASS_PATH")) {
	define("INCLUDES_CLASS_PATH", "includes/classes");
}

define("IMAGES_PATH", TEMPLATES_PATH . DS . "images");
/**
*  CSS path
*/
 if (!defined("CSS_PATH")){
	 define("CSS_PATH", "templates/css");
 }

/**
*  JAVASCRIPT path
*/
if (!defined("JS_PATH")) {
	 define("JS_PATH", INCLUDES_PATH . DS . "js");
 }


/*
* LABEL information.
**/

	define("USER_LOGIN", "User Login");
	define("ADMIN_CONTACT", "boladebode@gmail.com");
	define("META_TITLE", "Beedy School");

// Class Variables

global $configuration;
 
$configuration['db_encoding'] = 0;
 
  
	$configuration['db']	= DB_DATABASE; //	database name
	$configuration['host']	= DB_SERVER;		//	database host
	$configuration['user']	= DB_SERVER_USERNAME;			//	database user
	$configuration['pass']	= DB_SERVER_PASSWORD;				//	database password
	$configuration['port'] 	= '3306';			//	database port
 
//proxy settings - if you are behnd a proxy, change the settings below
$configuration['proxy_host'] = false;
$configuration['proxy_port'] = false;
$configuration['proxy_username'] = false;
$configuration['proxy_password'] = false;

//plugin settings
$configuration['plugins_path'] = $_SERVER['DOCUMENT_ROOT'] . '/eschools/includes/plugins';  //absolute path to plugins folder, e.g c:/mycode/test/plugins or /home/phpobj/public_html/plugins

define('DIR_FS_BACKUP', 'includes/backups/');
define('PHP_DATE_TIME_FORMAT', 'm/d/Y H:i:s');
define('COMP_NAME', 'Schools');
define('CMP_OWNER', $_SESSION['eschools']['admin_user']);  

$month_arr = array(1=>"April",2=>"May",3=>"June",4=>"July",5=>"August",6=>"September",7=>"October",8=>"November",9=>"December",10=>"January",11=>"February",12=>"March");
$inventory_type_arr = array(1=>"Returnable Goods",2=>"Non-returnable Goods");
?>