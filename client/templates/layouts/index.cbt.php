<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="description" content="EIMS <?php echo $meta_description ;?>	" />
<meta name="keywords" content="EIMS  <?php echo $meta_keywords; ?> " /> 


<link href="css/font-awesome.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/jquery.timepicker.css" rel="stylesheet" media="screen">
 	<link rel="stylesheet" href="packages/dist/sweetalert.css">
<link href="css/jquery-ui.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/font-awesome.min.css">


   <link rel="shortcut icon" href="../<?php echo _SCHOOL_LOGO; ?>">

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
 </head>
<body class="body_class">

<div  class="container-90">

<div class="mainBeedyContainer"> 
<?php include (INCLUDES_PATH . DS .'header.cbt.php');  ?>
	
<!--top menu -->
<div class="topMenu"> 
  
				 
	 <font style="color:darkblue; font:bold 24px 'cambria';">CLIENT VIEW	</font>
	 <input type="text" style="  background:white; border:none; font-size:16px;  font-weight:bolder;  " class="clock" id="clock" />
	
<nav class="navbar navbar-static-top pull-right" role="navigation"> 
<div> 
<ul class="nav navbar-nav"> 
 <li><a href="?pid=1&action=Examination/">Examination</a></li>  
 <li><a href="?pid=2&action=View-Profile/">View Profile</a></li>  
<li><a href="log/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li> 
</ul> 
</div>
</nav>

</div>
<!--top menu -->

<div class="row"> 

<!---- main content goes here----->
<div class="col-md-12" >
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
 
 
</div>




</div>
<?php  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="style/' . $eachscript . '"></script>' . "\n";
  }
  ?>  
  
   
</body>
</html>