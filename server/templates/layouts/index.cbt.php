<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="description" content="TWINDER <?php echo $meta_description ;?>	" />
<meta name="keywords" content="TWINDER  <?php echo $meta_keywords; ?> " /> 


<link href="css/font-awesome.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/jquery.timepicker.css" rel="stylesheet" media="screen">
 	<link rel="stylesheet" href="packages/dist/sweetalert.css">
<link href="css/jquery-ui.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/font-awesome.min.css">

<link href="style/style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link rel="stylesheet" type="text/css" href="style/jGrowl/jquery.jgrowl.css"/>
<link rel="stylesheet" type="text/css" href="style/custom.css"  media="screen" />
<title><?php echo $_SESSION['cbt']['schoolname']; ?> : 
<?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['cbt']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="css/pink.css" rel="stylesheet" type="text/css" />';
  }
 
?>
<!-- Datatables -->
<link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
   
<script type="text/JavaScript"  src="packages/dist/sweetalert.min.js"></script>

<script type="text/javascript">
var popupWindow=null;
function modifyStudent(stdAddNum)
{  // window.location = 'test.php?stdAddNum=' + stdAddNum ;
popupWindow =window.open('templates/modifyStudent.php?stdAddNum=' + stdAddNum,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
} 
</script>

  </head>
<body class="body_class">

<div  class="container-90">

<div class="firstelement">
<div>
<div class="settings pull-left"> 
<a href="?pid=16&action=About"><button class="btn btn-info" style="border:2px solid #ff0;" >
About </button></a> 
<?php if (in_array("9_1", $area_privilege)): ?>
<a href="?pid=15&action=Permissions"><button class="btn btn-danger" style="border:2px solid #ff0;" >
Permissions </button></a> 
<a href="?pid=17&action=Activation"><button class="btn btn-warning" style="border:2px solid #ff0;" >
Activation </button></a> 

 </div>

<div class="pull-right">
 
Select Theme: 
<a href="?pid=14&action=change_theme&tid=1" title="Blue Theme"><button class="btn" alt="Blue Colour" style=" background:#04A6DA; height:11px; width:8px; border:2px solid #ff0;" > </button></a> 
 &nbsp; <a href="?pid=14&action=change_theme&tid=2" title="Pink Theme"><button  class="btn" alt="Pink Colour" style=" background:#E8A8C7; height:11px; width:8px; border:2px solid #ff0;"> </button></a> 
 &nbsp;<a href="?pid=14&action=change_theme&tid=3"  title="Voilet Theme"><button  class="btn" alt="Voilet Colour" style=" background:#8DA9CB; height:11px; width:8px; border:2px solid #ff0;"> </button></a> 
 
				</div>

<?php else: echo "</div>"; endif; ?>
</div>

 
    </div>

	<div class="mainBeedyContainer"> 
<?php include (INCLUDES_PATH . DS .'header.cbt.php');  ?>
	
<!--top menu -->
<div class="topMenu"> 
  
				 
	 <font style="color:darkblue; font:bold 24px 'cambria';">SERVER WINDOW	</font>
	 <input type="text" style="  background:white; border:none; font-size:16px;  font-weight:bolder;  " class="clock" id="clock" />
	
<nav class="navbar navbar-static-top pull-right" role="navigation"> 
<div> 
<ul class="nav navbar-nav">
 
 <li><a href="?pid=1&action=default">Home</a></li>

  
<?php  if (in_array("7_1", $area_privilege)
	&& in_array("7_2", $area_privilege)
&& in_array("7_3", $area_privilege) 
&& in_array("7_4", $area_privilege)	
&& in_array("7_5", $area_privilege)
	&& in_array("7_6", $area_privilege)): ?> 
<li><a href="?pid=22&action=Examination">Examination</a></li>  <?php endif; ?>  
<li><a href="log/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li> 
</ul> 
</div>
</nav>

</div>
<!--top menu -->

<div class="row">
<!--system major menu -->
<div class="col-md-3">
<div class="leftContainer cbt-2-left">

<div class="text-left"  style="margin-top: 18px;">
<font style="color:darkblue; font:bold 24px 'cambria';">SYSTEM MENU</font>
<hr style="margin:8px; border-bottom:1px solid #ccc;" />
<div style="margin:8px;">
<div class="ellipsis-text">
<i class="icon-wrench icon-large"></i> 
<a style ="color:#000; font-size:16px; line-height:25px;" class="<?PHP @$current = $_GET['action'];
if($current=="SchoolSettings/" || $current==""): echo "current"; endif; ?>"  href="?pid=1&action=SchoolSettings/">
General Settings</a><hr style="margin:8px; border-bottom:1px solid #ccc;" />

<i class="icon-group icon-large"></i> 
<a style ="color:#000; font-size:16px; line-height:25px;" class="<?PHP
if($current=="group/"): echo "current"; endif; ?>" href="?pid=2&action=group/">
Group Management</a><hr style="margin:8px; border-bottom:1px solid #ccc;" />
 
<i class="beedy-class"></i> 
<a style ="color:#000; font-size:16px; line-height:25px;" class="<?PHP
if($current=="manageClass/"): echo "current"; endif; ?>" href="?pid=3&action=manageClass/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Class Management</a><hr style="margin:8px; border-bottom:1px solid #ccc;" />
 
<i class="icon-book icon-large"></i> 
<a style ="color:#000; font-size:16px; line-height:25px;" class="<?PHP
if($current=="manageSubject/"): echo "current"; endif; ?>" href="?pid=4&action=manageSubject/">
Subject Management</a><hr style="margin:8px; border-bottom:1px solid #ccc;" />
 
<i class="beedy-student"></i> 
<a style ="color:#000; font-size:16px; line-height:25px;" class="<?PHP
if($current=="student/"): echo "current"; endif; ?>" href="?pid=5&action=student/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Student Management</a><hr style="margin:8px; border-bottom:1px solid #ccc;" />
 
<i class="beedy-admin"></i> 
<a style ="color:#000; font-size:16px; line-height:25px;" class="<?PHP
if($current=="admin/"): echo "current"; endif; ?>" href="?pid=6&action=admin/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Manage Admin</a><hr style="margin:8px; border-bottom:1px solid #ccc;" />
 
</div></div>
</div>

</div>
</div>


<!---- main content goes here----->
<div class="col-md-7" >
<div class="beedyTemplate">
 <?php 
			/***
			*	Desired page come to here
			*/
				include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
			?>
</div>
</div>
<!---- main content ends here----->

<!---- right content goes here----->

<div class="col-md-2" >
<div class="rightContainer cbt-2-right">
<?php
include( TEMPLATES_PATH . DS . 'layouts' . DS . "rightContent.php");
	
?>
</div>
</div>

<!---- right content ends here----->






</div>




</div>
<?php  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="style/' . $eachscript . '"></script>' . "\n";
  }
  ?> 
  
 
 <script language="javascript" type="text/javascript"> 
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.getElementById("clock").value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() { 
stopclock();
showtime();
}

 startclock();
// End -->
</SCRIPT>
<!-- Datatables -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<!-- Datatables -->
 <script>

$(document).ready(function() {
var handleDataTableButtons = function() {
if ($("#datatable-buttons").length) {
$("#datatable-buttons").DataTable({
dom: "Bfrtip",
buttons: [
{
extend: "copy",
className: "btn-sm"
},
{
extend: "csv",
className: "btn-sm"
},
{
extend: "excel",
className: "btn-sm"
},
{
extend: "pdfHtml5",
className: "btn-sm"
},
{
extend: "print",
className: "btn-sm"
},
],
responsive: true
});
}
};
TableManageButtons = function() {
"use strict";
return {
init: function() {
handleDataTableButtons();
}
};
}();
$('#datatable').dataTable();
$('#datatable-keytable').DataTable({
keys: true
});
$('#datatable-CurrentFees').DataTable();
$('#datatable-PaymentHis').DataTable();
$('#datatable-PendingPayment').DataTable();
$('#datatable-scroller').DataTable({
ajax: "js/datatables/json/scroller-demo.json",
deferRender: true,
scrollY: 380,
scrollCollapse: true,
scroller: true
});
var table = $('#datatable-fixed-header').DataTable({
fixedHeader: true
});
TableManageButtons.init();
});

</script>
<!-- /Datatables -->
</body>
</html>