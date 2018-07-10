<?php
@$pid = $_GET['pid'];
@$sub = $_GET['sub'];


if(( $pid=="" || $pid=="17") &&( $sub=="" || $sub=="activateSoftware/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 17;
		$sub = "activateSoftware/";
	}
}

switch ($sub) {
	
		 
		case "activateSoftware/": $layout = "activateSoftware";
			break;
			 
		default: $layout = "activateSoftware";
	}
	
		
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists($layout . ".php")) {
		$layout = "ac";
	}

/** 
* Call templates 
*/
	include($layout.".php");
	
?>

 