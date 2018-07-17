 <?php
	ob_start();
	session_start();	
	 
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
	include ('includes/config.inc.php');
	//class
	function __autoload($class_name) {
		include_once INCLUDES_CLASS_PATH . DS . "class." . $class_name . '.php';
	}	
	include (INCLUDES_CLASS_PATH . DS .'developer.mysql.class.php');
	include (INCLUDES_CLASS_PATH . DS . 'validation.class.php');
	include (INCLUDES_CLASS_PATH . DS . 'html_form.class.php');
	
	//files
	include (INCLUDES_PATH . DS .'messages.inc.php');
	include (INCLUDES_PATH . DS . 'functions.inc.php');
	//sm_registerglobal('pid', 'admin', 'action', 'set_color');
	  
	  	include ('includes/DelDirectoryFnc.php');
			include ('includes/ParamLibFnc.php'); 
/**
* Meta keywords list
*/
	$meta_keywords    = "";
	$meta_description = "";

	$url=validateQueryString(curPageURL());
if($url===FALSE){
 header('Location: index.php');
 }
$url="installer/index.php";

if(isset($_GET['ins'])):

$install = optional_param('ins','',PARAM_ALPHAEXT);

if($install == 'comp')
{
	if (is_dir('installer'))
	{
		    

           $dir = 'installer/'; // IMPORTANT: with '/' at the end
           $remove_directory = delete_directory($dir);

           $dir2 = 'installer'; // IMPORTANT: with '/' at the end
           $remove_directory2 = removeDirectory($dir2);

/*	 $dir2 = 'abc/'; 
				 chmod($dir2, 0750);
       echo    $remove_directory2 = delete_directory($dir2);
 
unlink($dir2.'system.php');
unlink($dir2.'logout.php');*/
        
	}

}


endif;

if(file_exists($url))
{
header('location: installer/index.php');
}
	/// List of processes
	$arr_pages = array (
				0=> array (
							'action' => 'default.inc',
							'view'   => 'default.tpl',
							'labels' => 'default.lbl',
							'title'  => 'Default Page'
							),
				1=> array (
							'action' => 'adminlogin.inc',
							'view'   => 'adminlogin.tpl',
							'labels' => 'adminsignup.lbl',
							'title'  => 'Administrator Sign up'
							),
				2=> array (
							'action' => 'enquiry.inc',
							'view'   => 'enquiry.tpl',
							'labels' => 'enquiry.lbl',
							'title'  => 'Enquire page'
							),	
				 				
																				
						);    
						// $arr_pages[2]['title'] ;
						//var_dump($arr_pages);
						
						
						

	// include javascripts here
	$arr_scripts = array ('prototype.js', 'validator.js', 'datetimepicker.js', 'profile.js', 'datepickercontrol.js','DateTime.js','tiny_mce.js');
	$arr_css = array ('blue.css', 'pink.css', 'violet.css', 'green.css', 'orange.css', 'red.css');
	// set default process
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 1;
	}
	
	// Including inc files ( PHP Coding files )
	if (file_exists(INCLUDES_PATH . DS . $arr_pages[$pid]['action'] . ".php")) {
		include(INCLUDES_PATH . DS . $arr_pages[$pid]['action'] . ".php");
	}
	
	// Including Lables
	if (file_exists(LABELS_PATH. DS . $arr_pages[$pid]['labels'] . ".php")) {
		include(LABELS_PATH . DS . $arr_pages[$pid]['labels'] . ".php");
	}
	
	// set defualt $layout here
	switch ($pid) {
	
		case 0: $layout = "default";
			break;
		
		case 1: $layout = "adminlogin";
			break;
			
		case 2: if ($action=='printenquirylist' || $action=='print_enquiry'  ) $layout = "print2";
		break;
		
		case 3:	if ($action=='printlist' || $action=='printlist_enquiry' || $action=='print_cast_list' || $action=='print_age_wise' ) $layout = "print2";
		if ($action=='cast_list' || $action=='age_wise' ) $layout = "index_left";
			break;
			case 4:	if ($action=='print_assignment') $layout = "print2";
				if($action=='view' )$layout = "index_left";
			break;	
		case 5: $layout = "index_left"; 
		break;  
		default: $layout = "index";
	}
	
	
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/layouts/" . $layout . ".tpl.php")) {
		$layout = "index";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . 'layouts' . DS . $layout . ".tpl.php");
	
	echo '<script type="text/javascript">window.location = "server/"</script>';
?>
