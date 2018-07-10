<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  


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
 
 // include (INCLUDES_PATH . DS . 'htmleditor.php');
?>

<!-- Datatables -->
<link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
var popupWindow=null;
function modifyStudent(stdAddNum)
{  // window.location = 'test.php?stdAddNum=' + stdAddNum ;
popupWindow =window.open('templates/modifyStudent.php?stdAddNum=' + stdAddNum,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
}
function modifyStaff(empId)
{
popupWindow =window.open('modifyStaff.php?empId=' + empId,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
}
function printFinStatement(DateFrom,DateTo)
{
popupWindow =window.open('printFinStatement.php?DateFrom=' + DateFrom+'&DateTo='+DateTo,"_blank","directories=no,  status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
 popupWindow.print();
 }
</script>

  </head>
<body class="body_class">