
 <div class="row">
 <div class="col-lg-12">
 <div class="pageGuide">
 
 <a href="?pid=1&action=Add Exam&Loader=<?php if (in_array("8_1", $area_privilege)): ?>CreateGroup/<?php  else: echo "error-404"; endif;  ?>"> <img src="images/db_add.ico" alt=" Create Group" title="Create Group" /> </a> 
<a href="?pid=1&action=Add Exam&Loader=GroupHelper/"><img src="images/help-about.ico" id="help" alt="Help" title="Help"/></a> 
<a href="?pid=1&action=Add Exam&Loader=<?php if(empty($_GET['Loader'])): echo "GroupHelper/"; else: echo $_GET['Loader']; endif; ?>"> <img  src="images/view-refresh-3.ico" alt="Refresh" title="Refresh" /> </a> 
   
 </div>
 </div>
 
 </div> 
 
 <div class="row">

 <div class="col-lg-3">
 <div class=" divRightBorder" id="examGrp">
 
 </div>
 </div>
 
 <div class="col-lg-9">
 <div class=" divLeftBorder">
  <?php 
	@$page = $_GET['Loader'];
	@$pid = $_GET['pid'];
	
	if(( $pid=="" || $page=="1") &&( $page=="" || $page=="GroupHelper/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 1;
		$page = "GroupHelper/";
	}
}
 switch ($page) {
	
		 
		case "GroupHelper/": $layout = "GroupHelper";
			break;
			
		case "CreateGroup/":  $layout = "CreateGroup"; 
		break;   
		case "error-404":  $layout = "pageNotFound.cbt";
		break;
		  
		default: $layout = "GroupHelper/";
	}
	
		
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/" . $layout . ".php")) {
		$layout = "index";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . $layout . ".php");
	
?>
</div>
  
 </div>
 
 
 </div>
