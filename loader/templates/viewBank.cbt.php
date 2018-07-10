 <?php $grp= $_GET['exambankId'];  ?>  
 <input id="exambankId" type="hidden" value="<?php  echo $grp; ?>" />  
  
 <input id="bankId" type="hidden" value="<?php  echo $_GET['bankId']; ?>" />  
 
 <div class="row">
 <div class="col-lg-12">
 <div class="pageGuide">
 
 <a href="?pid=4&action=viewBank&exambankId=<?php echo $grp; ?>&Loader=loadQuestions/"> <img src="images/setquestion.png" width="45px" height="40px" alt=" Create Question" title="Create Question" /> </a> 
<a href="?pid=4&action=viewBank&exambankId=<?php echo $grp; ?>&Loader=bankGrpHelper/"><img src="images/help-about.ico" id="help" alt="Help" title="Help"/></a> 
<a href="?pid=4&action=viewBank&exambankId=<?php echo $grp; ?>&Loader=loadQuestions/"> <img  src="images/view-refresh-3.ico" alt="Refresh" title="Refresh" /> </a> 
   
 </div>
 </div>
 
 </div> 
 
 <div class="row">

 
 <div class="col-lg-3 innerMain-left" id="bankGrp"> 
 
 </div>
 
 <div class="col-lg-6 innerMain" id="editAddQst">
 
  <?php 
	@$page = $_GET['Loader'];
	@$pid = $_GET['pid'];
	
	if(( $pid=="" || $page=="4") &&( $page=="" || $page=="loadQuestions/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 4;
		$page = "loadQuestions/";
	}
}
 switch ($page) {
	
		 
		case "bankGrpHelper/": $layout = "bankGrpHelper";
			break;
			
		case "CreateBnkGrp/":  $layout = "CreateBnkGrp";
		break;
		case "loadQuestions/": $layout = "loadQuestions";
			break;
		 
		default: $layout = "loadQuestions/";
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

 <div class="col-lg-3 innerMain-right" id="settings_progress">
 
  
 </div>
 

 
 </div>
