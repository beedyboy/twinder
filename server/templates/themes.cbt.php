<?php
include('../includes/system.php');
	@$pid = $_GET['pid'];
		@$tid = $_GET['tid'];
/**
* Only Admin users can view the pages
*/ 
	//Changing theme of the template
      if(isset($tid) && $tid!="")
      {
       $theme_name[1] = "blue.css";
	   $theme_name[2] = "pink.css";
	   $theme_name[3] = "violet.css";
	   $theme_name[4] = "green.css";
	   $theme_name[5] = "orange.css";
	   $theme_name[6] = "red.css";	    
	   //selected Theme
	    $selected_theme = $theme_name[$tid];
	   unset($_SESSION['cbt']['user_theme']);	   
	   // Updating Data Base with Selected Theme
	   if(isset($_SESSION['cbt']['adminId']))
	   {
		   $GetSchool->updateTheme($selected_theme);
		   $_SESSION['cbt']['user_theme'] = $selected_theme;	   
		} 
	  header("Location:".$_SERVER['HTTP_REFERER']."&emsg=12");
	  exit;
      }
?>

 