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
<title>Login | <?php echo $_SESSION['cbt']['schoolname']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['cbt']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="css/pink.css" rel="stylesheet" type="text/css" />';
  } 
?> 

  </head>
<body class="login">

<?php
include( TEMPLATES_PATH . DS . "login.php");
	// include javascripts here
	$arr_scripts = array ('jquery.min.js', 'jquery-ui.js', 'jquery-form.js', 'jquery-1.5.min.js', 'jquery.jgrowl.js',
	'bootstrap.min.js','respond.min.js','beedy.js','beedyScript.js');
	$arr_css = array ('pink.css','orange.css', 'red.css');
	 
?>
<script src="packages/dist/sweetalert.min.js"></script> 
<?php  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="style/' . $eachscript . '"></script>' . "\n";
  }
  ?>  
</body>
</html>