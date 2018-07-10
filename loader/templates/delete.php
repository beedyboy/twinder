<?php
 	 spl_autoload_register(function ($class_name){
		$file_name =  "../classes/" . $class_name . '.php';
		if(file_exists($file_name)){
			require $file_name;
		}
	});
	ob_start();
	session_start();
$GetDatabase  = new Database();
$System  = new System();
$GetSchool  = new school();
$GetStudent  = new student();
$GetBeedyTips  = new BeedyTips();
$beedy = new beedy();

  $action= $_POST['action'];  
 if($action=="deleteSemester"):   
echo  $GetSchool->deleteSemester($_POST['SchoolTermId']);

elseif($action=="deleteStdGroup"):   
echo  $GetSchool->deleteStdGroup($_POST['groupId']);
  
endif;
?>
