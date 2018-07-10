<?php
@$pid = $_GET['pid'];
@$sub = $_GET['sub'];


if(( $pid=="" || $page=="1") &&( $sub=="" || $sub=="examType/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 22;
		$sub = "examType/";
	}
}

switch ($sub) {
	
		 
		case "examType/": $layout = "examType";
			break;
			
		case "Exam-Manager/":  $layout = "ExamManager";
		break;
		case "Exam-Result/":  $layout = "ExamResult";
		break;
		case "setExam/":  $layout = "setExam";
		break; 
		case "filteredResult/":  $layout = "filteredResult";
		break;  
		case "error-404":  $layout = "pageNotFound";
		break;
		default: $layout = "examType";
	}
	
		
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/" . $layout . ".cbt.php")) {
		$layout = "examination";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . $layout . ".cbt.php");
	
?>

 