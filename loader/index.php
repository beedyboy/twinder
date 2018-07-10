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
	include ('includes/config.inc.php');
	//class
	include (INCLUDES_PATH . DS . 'functions.cbt.php');
	include (INCLUDES_PATH . DS . 'system.php'); 
	 
	ob_start();
	session_start();
  
$GetSession  = new my_Session();
$GetDatabase  = new Database();
$GetSchool  = new school();
$GetBeedyTips  = new BeedyTips();
$beedy = new beedy();
 
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
 
	//files
	include (INCLUDES_PATH . DS .'messages.inc.php');
	
	// include javascripts here


	
/**
* Meta keywords list
*/
	$meta_keywords    = "";
	$meta_description = "";

	/// List of processes
	$arr_pages = array (
				0=> array (
							'action' => 'default.inc',
							'view'   => 'default.cbt',
							'labels' => 'default.lbl',
							'title'  => 'Loader Default Page'
							),
				1=> array (
							'action' => 'addExam.inc',
							'view'   => 'addExam.cbt',
							'labels' => 'addExam.lbl',
							'title'  => 'Add Exam'
							),
				2=> array (
							'action' => 'setExam.inc',
							'view'   => 'setExam.cbt',
							'labels' => 'setExam.lbl',
							'title'  => 'Set Exam'
							),	 										
					 
				3=> array (
							'action' => 'viewGrp.inc',
							'view'   => 'viewGrp.cbt',
							'labels' => 'viewGrp.lbl',
							'title'  => 'View Group'
							),
				4=> array (
							'action' => 'viewBank.inc',
							'view'   => 'viewBank.cbt',
							'labels' => 'viewBank.lbl',
							'title'  => 'View Bank'
							),	 										
						); 
						
 

	//check session
		isset($_SESSION['cbt']['page']) ? "" :  $_SESSION['cbt']['page']='login';
if(isset($_SESSION['cbt']['page']) AND $_SESSION['cbt']['page']!= "logged"): 
include_layout_template('templates/','default.cbt.php');
	 
else: 


	// set default process
	@$pid = $_GET['pid'];


if($pid=="" || $page=="SchoolSettings")
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 1;
	}
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
		
		case 1: $layout = "addExam";
			break;
			
		case 2:  $layout = "setExam";
		break;
			
		case 3:  $layout = "viewGrp";
		break;
		case 4:  $layout = "viewBank";
		break;
		  
		default: $layout = "index";
	}
	
	
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/layouts/" . $layout . ".cbt.php")) {
		$layout = "index";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . 'layouts' . DS . $layout . ".cbt.php");
	
endif;

?>
