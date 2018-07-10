	 
<nav class="navbar navbar-static-top" role="navigation"> 
<div> 
<ul class="nav navbar-nav">
 
 <li><a href="?pid=1&action=SchoolSettings/&sub=<?php if (in_array("1_1", $area_privilege)): ?>Institution-Details/ 
 <?php else: echo "error-404"; endif; ?>">Institution Details</a></li> 
 
 <li><a href="?pid=1&action=SchoolSettings/&sub=<?php if (in_array("1_2", $area_privilege) && in_array("1_2a", $area_privilege) && in_array("1_2b", $area_privilege)): ?>Manage-Session/ <?php else: echo "error-404"; endif; ?>"> Manage Session</a></li> 
 
 <li><a href="?pid=1&action=SchoolSettings/&sub=<?php if ( (in_array("1_3", $area_privilege)) || (in_array("1_3a", $area_privilege)) || (in_array("1_3b", $area_privilege))): ?>Manage-Term/
 <?php else: echo "error-404"; endif; ?>"> Manage Term</a></li> 
 
 
</ul> 
</div>
</nav>

<?php
@$pid = $_GET['pid'];
@$sub = $_GET['sub'];


if(( $pid=="" || $page=="1") &&( $sub=="" || $sub=="Institution-Details/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 1;
		$sub = "Institution-Details/";
	}
}

switch ($sub) {
	
		 
		case "Institution-Details/": $layout = "schoolData";
			break;
			
		case "Manage-Session/":  $layout = "manageSession";
		break;
		case "Manage-Term/":  $layout = "manageTerm";
		break; 
		case "error-404":  $layout = "pageNotFound";
		break;
		 
		 
		default: $layout = "schoolData";
	}
	
		
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/" . $layout . ".cbt.php")) {
		$layout = "index";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . $layout . ".cbt.php");
	
?>