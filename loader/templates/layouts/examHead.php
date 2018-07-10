<?php
 
 	$arr_scripts = array ('jquery.min.js', 'bootstrap.min.js','respond.min.js','beedy.js','beedyScript.js');
	$arr_css = array ('pink.css','orange.css', 'red.css');
	    ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<link href="../css/font-awesome.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/jquery.timepicker.css" rel="stylesheet" media="screen"> 
<link href="../css/jquery-ui.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="../css/font-awesome.min.css">

<link href="../style/style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link rel="stylesheet" type="text/css" href="../style/jGrowl/jquery.jgrowl.css"/>
<link rel="stylesheet" type="text/css" href="../style/custom.css"  media="screen" />
<title><?php echo $_SESSION['cbt']['schoolname']; ?> : 
<?php if (isset($arr_pages[4]['title'])) echo $arr_pages[4]['title']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['cbt']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="../css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="../css/pink.css" rel="stylesheet" type="text/css" />';
  }
 
 // include (INCLUDES_PATH . DS . 'htmleditor.php');
?>

 
  <!-- include summernote css/js-->
<link href="../dist/summernote.css" / rel="stylesheet">
          <link href="../assets/css/line-icons.css" rel="stylesheet" type="text/css">
              <link href="../assets/css/elegant-icons-style.css" rel="stylesheet" type="text/css">
 	<link rel="stylesheet" href="../assets/dist/sweetalert.css">
	   
   <link rel="stylesheet" href="../src/update.css" />
 
  </head>
 

<?php  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="../style/' . $eachscript . '"></script>' . "\n";
  }
  ?>  
  <!-- javascripts -->
     <script src="../assets/dist/sweetalert-dev.js"></script>
    <!-- nice scroll -->
    	    <script src="../assets/js/bootstrap-toggle.js"></script>
	 	<!-- include summernote css/js-->
  <script src="../dist/summernote.min.js"></script>
         <!-- custome script for all page-->

 <script src="../src/update.js" type="text/javascript"></script>
        <script type="text/javascript">
$(document).ready(function() {
	$('.summernote').summernote({
		height: "150px"
	});
});
var postForm = function() {
	var content = $('textarea[name="content"]').html($('#summernote').code());
}
function closeWindow(){
	alert("closed");
}
</script> 