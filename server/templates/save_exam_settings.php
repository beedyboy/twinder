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
 
$GetExam  = new Examination(); 

$subId=$_GET['subId']; 
$exambankId=$_GET['exambankId']; 
$Exam_Instruction = $_GET['instruction']; 
$Exam_Duration = $_GET['duration']; 
$Exam_Date = $_GET['date']; 
$mark = $_GET['mark']; 
$getface = $_GET['getface']; 
$examTypeId = $_GET['examTypeId']; 
$showsorting = $_GET['showsorting']; 
$showresult = $_GET['showresult']; 
$no_ques = $_GET['no_ques']; 
$Active='Yes';
 
echo $GetExam->updateExamSubGrp($subId,$exambankId,$Exam_Instruction,$Exam_Duration,$Exam_Date,$mark,$getface,$examTypeId,$showsorting,$showresult,$no_ques,$Active); 

  

 ?>
					 