<?php
@$pid = $_GET['pid'];
@$sub = $_GET['sub'];


if(( $pid=="" || $pid=="15") &&( $sub=="" || $sub=="userType/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 15;
		$sub = "userType/";
	}
}

switch ($sub) {
	
		 
		case "userType/": $layout = "userType";
			break;
			
		case "Exam-Manager/":  $layout = "ExamManager";
		break;
		case "viewUserType/":  $layout = "viewUserType"; 
		break; 
		default: $layout = "userType";
	}
	
		
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/" . $layout . ".cbt.php")) {
		$layout = "permissions";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . $layout . ".cbt.php");
	
?>

 