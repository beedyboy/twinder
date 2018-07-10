<?php	
error_reporting(0);
$path_arr = explode('/', $_SERVER['PHP_SELF']);
$cur_foldpath =  count($path_arr)-3;
//This variable is for avoiding the unautherized page access 
if (!defined('FROMINDEX')) {	
define('FROMINDEX', true);
}
if (!defined('DS')) {
define('DS', '/');
}	
include ('../includes/config.inc.php');
include ('../includes/constant.cbt.php');
//class
spl_autoload_register(function ($class_name){
$file_name = '../'.INCLUDES_CLASS_PATH . DS. $class_name . '.php';
if(file_exists($file_name)){
require $file_name;
}
});
$arr_scripts = array ('jquery.min.js', 'jquery-ui.js', 'jquery-form.js', 'jquery-1.5.min.js', 'jquery.jgrowl.js',
'bootstrap.min.js','respond.min.js','beedy.js','beedyScript.js');
$arr_css = array ('blue.css','pink.css', 'violet.css');   
ob_start();
session_start();
$GetSession  = new my_Session();
$GetDatabase  = new Database();
$GetSchool  = new school();
$GetBeedyTips  = new BeedyTips();
$beedy = new beedy(); 
$meta_keywords    = "";
$meta_description = "";
/// List of processes
$arr_pages = array (
0=> array (
'action' => 'default.inc',
'view'   => 'default.cbt',
'labels' => 'default.lbl',
'title'  => 'Server Default Page'
),
17=> array (
'action' => 'activateSoftware',
'view'   => 'activation',
'labels' => 'admin.lbl',
'title'  => 'Software Activation Window'
)									
); 
@$pid = $_GET['pid'];
if($pid=="" || $pid=="17" )
{
if (!isset($pid) || $pid >= count($arr_pages)) {
$pid = 17;
}
} 
// set defualt $layout here
switch ($pid) { 
case 17: $layout = "activationWindow"; 
break;    
}
/**
* for default layout
*/ 
if (!isset($layout)||$layout=="" || !file_exists($layout.".php")) {
$layout = "activationWindow";
}
/** 
* Call templates 
*/
include($layout.".php");
?>