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
$GetExam  = new Examination();
$beedy = new beedy();

  $action= $_POST['action'];  
if($action=="deleteAdmin"):  
$adminId= $_POST['adminId'];
echo  System::deleteAdmin($adminId);

elseif($action=="deleteBanStudent"):  
$tid= $_POST['tid'];
$stdAddNum= $_POST['stdAddNum'];
if($tid=="deleteStudent"):
echo  $GetStudent->deleteStudent($stdAddNum);

elseif($tid=="disableStudent"):
echo  $GetStudent->disableStudent($stdAddNum);
elseif($tid=="enableStudent"):
echo  $GetStudent->enableStudent($stdAddNum);

endif;  

elseif($action=="deleteSession"):   
echo  $GetSchool->deleteSession($_POST['genStdBatchId']);

elseif($action=="deleteSemester"):   
echo  $GetSchool->deleteSemester($_POST['SchoolTermId']);

elseif($action=="deleteStdGroup"):   
echo  $GetSchool->deleteStdGroup($_POST['groupId']);
 
elseif($action=="deleteclassList"):   
echo  $GetSchool->deleteFrmClass($_POST['classId']);
 
elseif($action=="deleteSubjectList"):   
echo  $GetSchool->deleteSubjectList($_POST['subId']);
  
elseif($action=="deleteexmType"):   
echo  $GetSchool->deleteExamType($_POST['examTypeId']);
 
 
elseif($action=="examManager"):  
$tid= $_POST['tid'];
$bankId= $_POST['bankId'];
if($tid=="endExam"):
echo  $GetExam->endExam($bankId);

elseif($tid=="enableExam"):
echo  $GetExam->enableExam($bankId); 
endif;  


endif;
?>
