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
<link rel="stylesheet" href="css/font-awesome/fontawesome-all.css">

<link href="style/style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link rel="stylesheet" type="text/css" href="style/jGrowl/jquery.jgrowl.css"/>
<link rel="stylesheet" type="text/css" href="style/custom.css"  media="screen" />
<title><?php echo $_SESSION['cbt']['schoolname']; ?> : 
<?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php 
$setting_css = $_SESSION['cbt']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="css/pink.css" rel="stylesheet" type="text/css" />';
  } 
?>

	<link rel="stylesheet" href="src/update.css" /> 
    <link rel="stylesheet" href="src/jquery.jqplot.css" type="text/css" />

<!-- Datatables -->
<link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  
	<script language="javascript" type="text/javascript" src="style/jquery.min.js"></script> 

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
  
				 
	 <font style="color:darkblue; font:bold 24px 'cambria';">EXAMINATION PANEL	</font>
	 <input type="text" style="  background:white; border:none; font-size:16px;  font-weight:bolder;  " class="clock" id="clock" />
	
<nav class="navbar navbar-static-top pull-right" role="navigation"> 
<div> 
<ul class="nav navbar-nav">
 
 <li><a href="?pid=1&action=default">Home</a></li>   
 <li><a href="?pid=22&action=Examination&sub=<?php if (in_array("7_1", $area_privilege) && in_array("7_2", $area_privilege) && in_array("7_3", $area_privilege)): ?>examType/<?php else: echo "error-404"; endif; ?>">Exam Type</a></li>   
 <li><a href="?pid=22&action=Examination&sub=<?php if (in_array("7_4", $area_privilege)): ?>setExam/<?php else: echo "error-404"; endif; ?>">Set Exam</a></li>   
 <li><a href="?pid=22&action=Examination&sub=<?php if (in_array("7_5", $area_privilege)): ?>Exam-Manager/<?php else: echo "error-404"; endif; ?>">Exam Manager</a></li>   
 <li><a href="?pid=22&action=Examination&sub=<?php if (in_array("7_6", $area_privilege)): ?>Exam-Result/<?php else: echo "error-404"; endif; ?>">Result</a></li>   
<li><a href="log/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li> 
</ul> 
</div>
</nav>

</div>
<!--top menu -->
<div class="row"> 
 <div class="col-md-12" > 

 <?php 
		 
				include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
		 
			?>
</div>
</div>



</div>
<script src="packages/dist/sweetalert.min.js"></script> 
 
<?php  
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="style/' . $eachscript . '"></script>' . "\n";
  }
  ?>  
<script type="text/javascript" src="style/jspdf.debug.js"></script>
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
 
<script type="text/javascript" src="js/jspdf.debug.js"></script>
 <script src="src/exam_setting.js" type="text/javascript"></script>
<script src="src/update.js" type="text/javascript"></script>
<script type="text/javascript" src="style/Chart.js"></script>
<script type="text/javascript" src="style/linegraph.js"></script>  
	

    <script  type="text/javascript" src="src/jquery.jqplot.min.js"></script> 
<!-- Additional plugins go here -->

  <script  type="text/javascript" src="src/jqplot.barRenderer.js"></script> 
  <script  type="text/javascript" src="src/jqplot.categoryAxisRenderer.js"></script> 
  <script  type="text/javascript" src="src/jqplot.logAxisRenderer.js"></script>
  <script class="include" type="text/javascript" src="src/jqplot.pointLabels.js"></script>
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