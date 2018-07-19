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
	 
/*	ob_start();
	session_start();*/
  
$GetSession  = new my_Session();
$GetDatabase  = new Database();
$GetSchool  = new school();
$GetBeedyTips  = new BeedyTips();
$beedy = new beedy();
 
	//files
	// include (INCLUDES_PATH . DS .'messages.inc.php');
	
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
							'action' => 'examDashboard.inc',
							'view'   => 'examDashboard.cbt',
							'labels' => 'examDashboard.lbl',
							'title'  => 'Exam Dashboard'
							),
				2=> array (
							'action' => 'viewProfile.inc',
							'view'   => 'viewProfile.cbt',
							'labels' => 'viewProfile.lbl',
							'title'  => 'Set Exam'
							),
				22=> array (
							'action' => 'Examination',
							'view'   => 'examination.cbt',
							'labels' => 'admin.lbl',
							'title'  => 'Examination Management'
							), 	 								
						); 
						
 $face_pages = array (
				0=> array (
							'action' => 'default.inc',
							'view'   => 'default.cbt',
							'labels' => 'default.lbl',
							'title'  => 'Loader Default Page'
							),
1=> array (
							'action' => 'beedy-quick.inc',
							'view'   => 'Quick-Exam.face',
							'labels' => 'beedy-quick.lbl',
							'title'  => 'Quick Exam'
							),

2=> array (
							'action' => 'beedy-one.inc',
							'view'   => 'All-In-One.face',
							'labels' => 'beedy-one.lbl',
							'title'  => 'One  Exam'
							),
3=> array (
							'action' => 'beedy-flex.inc',
							'view'   => 'beedy-flexible.face',
							'labels' => 'beedy-flexible.lbl',
							'title'  => 'Flexible  Exam Mode'
							),
4=> array (
							'action' => 'twinderFace.inc',
							'view'   => 'twinderFace.face',
							'labels' => 'twinderFace.lbl',
							'title'  => 'Twinder Face  Exam Mode'
							),

							); 
	//check session
		isset($_SESSION['cbt']['page']) ? "" :  $_SESSION['cbt']['page']='login';
if(isset($_SESSION['cbt']['page']) AND $_SESSION['cbt']['page']!= "logged"): 
include_layout_template('templates/','default.cbt.php');
	 
else: 


	// set default process
	
	@$face = $_GET['face'];

if($face=="" || $face=="examDashboard")
{
	if (!isset($face) || $face >= count($arr_pages)) {
		$face = 1;
	}
}
	// set defualt $layout here
	switch ($face) {
	
		case 0: $interface = "default";
			break; 
		case 1:  $interface = "All-In-One";
		break;  
		case 2: $interface = "Quick-Exam";
			break; 
		case 3:  $interface = "beedy-flexible";
		break;  
		case 3:  $interface = "twinderFace";
		break; 
		  case 22: $interface = "examination"; 
		break;  
		default: $interface = "All-In-One";
	}
	
	
	
@$pid = $_GET['pid'];
if($pid=="" || $pid=="examDashboard")
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
		
		case 1: $layout = "examDashboard";
			break;
			
		case 2:  $layout = "viewProfile";
		break; 
		  case 22: $layout = "examination"; 
		break;  
		default: $layout = "index";
	}
	
		
/**
* for default layout
*/
if ($pid==22){
	if (!isset($layout)|| $layout=="" || !file_exists("templates/layouts/" . $layout . ".cbt.php")) {
		$layout = "examination";  
	}
	}
else{
	if (!isset($layout)||$layout=="" || !file_exists("templates/layouts/" . $layout . ".cbt.php")) {
		$layout = "index";
	}

	}
 

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . 'layouts' . DS . $layout . ".cbt.php");
	
endif;

?>
