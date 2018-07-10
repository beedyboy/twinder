 <nav class="navbar navbar-static-top" role="navigation"> 
<div> 
<ul class="nav navbar-nav">
  
 
 
 
 <li><a href="?pid=5&action=student/&sub=<?php if (in_array("5_1", $area_privilege)): ?>Add-Student/<?php else: echo "error-404"; endif; ?>">Add Student</a></li>   
 <li><a href="?pid=5&action=student/&sub=<?php if (in_array("5_2", $area_privilege) && in_array("5_2a", $area_privilege) && in_array("5_2b", $area_privilege)): ?>View-Student/<?php else: echo "error-404"; endif; ?>">View Student</a></li>   
</ul> 
</div>
</nav>


<?php
@$pid = $_GET['pid'];
@$sub = $_GET['sub'];


if(( $pid=="" || $page=="5") &&( $sub=="" || $sub=="Add-Student/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 1;
		$sub = "Add-Student/";
	}
}

switch ($sub) {
	
		 
		case "Add-Student/": $layout = "addStudent";
			break;
			
		case "View-Student/":  $layout = "viewStudents";
		break;  
		case "error-404":  $layout = "pageNotFound";
		break;
		 
		default: $layout = "addStudent";
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