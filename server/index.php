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
 
	//files
	include (INCLUDES_PATH . DS .'messages.inc.php');
	
	// include javascripts here
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
 
// var_dump($area_privilege);
 

	
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
							'title'  => 'Server Default Page'
							),
				1=> array (
							'action' => 'SchoolSettings.inc',
							'view'   => 'SchoolSettings.cbt',
							'labels' => 'SchoolSettings.lbl',
							'title'  => 'School Settings'
							),
				2=> array (
							'action' => 'group.inc',
							'view'   => 'manageGroup.cbt',
							'labels' => 'group.lbl',
							'title'  => 'Manage Group'
							),	
				3=> array (
							'action' => 'class.inc',
							'view'   => 'manageClass.cbt',
							'labels' => 'class.lbl',
							'title'  => 'Manage Class'
							),	
				 				
				4=> array (
							'action' => 'subject.inc',
							'view'   => 'manageSubject.cbt',
							'labels' => 'subject.lbl',
							'title'  => 'Subject Management'
							),	
				 				
				5=> array (
							'action' => 'student.inc',
							'view'   => 'StudentsManagement.cbt',
							'labels' => 'subject.lbl',
							'title'  => 'Students Management'
							),	
				 				
				6=> array (
							'action' => 'admin.inc',
							'view'   => 'manageAdmin.cbt',
							'labels' => 'admin.lbl',
							'title'  => 'Admin Management'
							),	
				 										
				14=> array (
							'action' => 'themes.inc',
							'view'   => 'themes.cbt',
							'labels' => 'themes.lbl',
							'title'  => 'Themes'
							), 
				15=> array (
							'action' => 'Permissions',
							'view'   => 'permissionWindow.cbt',
							'labels' => 'admin.lbl',
							'title'  => 'Permission Management'
							), 
				16=> array (
							'action' => 'About Us',
							'view'   => 'aboutSoftware.cbt',
							'labels' => 'about.lbl',
							'title'  => 'About Us'
							), 
				17=> array (
							'action' => 'activateSoftware',
							'view'   => 'activation.cbt',
							'labels' => 'admin.lbl',
							'title'  => 'Software Activation Window'
							), 
				22=> array (
							'action' => 'Examination',
							'view'   => 'examPanel.cbt',
							'labels' => 'admin.lbl',
							'title'  => 'Examination Management'
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
		
		case 1: $layout = "SchoolSettings";
			break;
			
		case 2:  $layout = "manageGroup";
		break;
		
		case 3:	$layout = "manageClass";
		break;
		
		case 4:	  $layout = "manageSubject"; 
			break;	
		case 5: $layout = "StudentsManagement"; 
		break;  
		case 6: $layout = "manageAdmin"; 
		break;  
		case 14: $layout = "themes"; 
		break;  
		case 15: $layout = "permissions"; 
		break;   
		case 16: $layout = "aboutWindow"; 
		break;    
		case 17: $layout = "activationWindow"; 
		break;   
		case 22: $layout = "examination"; 
		break;  
		default: $layout = "index";
	}
	
	
/**
* for default layout
*/
if ($pid==15){
	if (!isset($layout)|| $layout=="" || !file_exists("templates/layouts/" . $layout . ".cbt.php")) {
		$layout = "permissions";  
	}
	}
else if ($pid==16){
	if (!isset($layout)|| $layout=="" || !file_exists("templates/layouts/" . $layout . ".cbt.php")) {
		$layout = "aboutWindow";  
	}
	}
else if ($pid==17){
	if (!isset($layout)|| $layout=="" || !file_exists("templates/layouts/" . $layout . ".cbt.php")) {
		$layout = "activation";  
	}
	}
else if ($pid==18){
	if (!isset($layout)|| $layout=="" || !file_exists("templates/layouts/" . $layout . ".cbt.php")) {
		$layout = "PrintPDF";  
	}
	}
else if ($pid==22){
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
