 <?php $grp= $_GET['exambankId']; ?>  
 <input id="exambankId" type="hidden" value="<?php  echo $grp; ?>" />  
 
 <div class="row">
 <div class="col-lg-12">
 <div class="pageGuide">
 
 <a href="?pid=3&action=viewGrp&exambankId=<?php echo $grp; ?>&Loader=<?php if (in_array("8_4", $area_privilege)): ?>CreateBnkGrp/<?php  else: echo "error-404"; endif;  ?>"> <img src="images/insert-table.ico" alt=" Create Bank Subject File" title="Create Group" /> </a> 
<a href="?pid=3&action=viewGrp&exambankId=<?php echo $grp; ?>&Loader=bankGrpHelper/"><img src="images/help-about.ico" id="help" alt="Help" title="Help"/></a> 
<a href="?pid=3&action=viewGrp&exambankId=<?php echo $grp; ?>"> <img  src="images/view-refresh-3.ico" alt="Refresh" title="Refresh" /> </a> 
   
 </div>
 </div>
 
 </div> 
 
 <div class="row">

 <div class="col-lg-3">
 <div class=" divRightBorder" id="bankGrp">
 
 </div>
 </div>
 
 <div class="col-lg-9">
 <div class=" divLeftBorder">
  <?php 
	@$page = $_GET['Loader'];
	@$pid = $_GET['pid'];
	
	if(( $pid=="" || $page=="3") &&( $page=="" || $page=="bankGrpHelper/") )
{
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 3;
		$page = "bankGrpHelper/";
	}
}
 switch ($page) {
	
		 
		case "bankGrpHelper/": $layout = "bankGrpHelper";
			break;
			
		case "CreateBnkGrp/":  $layout = "CreateBnkGrp";
		break;
		case "Manage-Term/":  $layout = "manageTerm";
		break;	case "error-404":  $layout = "pageNotFound.cbt";
		break;
		  
		default: $layout = "bankGrpHelper/";
	}
	
		
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/" . $layout . ".php")) {
		$layout = "bankGrpHelper";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . $layout . ".php");
	
?>
</div>
  
 </div>
 
 
 </div>
